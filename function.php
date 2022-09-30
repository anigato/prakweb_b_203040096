<?php
function connect()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "prakweb_2022_b_203040096");
    return $conn;
}

function query($query)
{
    $conn = connect();

    $result = mysqli_query($conn, $query);

    // jika hasilnya hanya 1 data
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// mencari produk
function search($keyword){
    $conn = connect();

    $query = "SELECT * FROM buku WHERE 
    judul LIKE '%$keyword%' OR
    penulis LIKE '%$keyword%' OR
    penerbit LIKE '%$keyword%'
    ORDER BY id DESC";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// membuat batas kata ditampilkan
function batas($string, $length)
{
    if (strlen($string) <= ($length)) {
        echo $string;
    } else {
        $kata = strip_tags($string);
        if (strlen($kata) > $length) {

            // truncate kata
            $kataCut = substr($kata, 0, $length);
            $endPoint = strrpos($kataCut, ' ');

            //if the kata doesn't contain any space then it will cut without Word basis.
            $kata = $endPoint ? substr($kataCut, 0, $endPoint) : substr($kataCut, 0);
            $kata .= '...';
        }
        echo $kata;
    }
}


//tambah produk
function tambah($data, $img)
{
    $conn = connect();

    $title = htmlspecialchars($data['inputTitle']);
    $writter = htmlspecialchars($data['inputWritter']);
    $publisher = htmlspecialchars($data['inputPublisher']);
    $published = htmlspecialchars($data['inputPublished']);
    $img = $img;

    $query = "insert into buku values (null,'$title','$writter','$publisher','$published','$img')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



//hapus produk
function hapus($id)
{
    $query = query("SELECT gambar FROM buku WHERE id = $id");
    unlink("asset/img/" . $query['gambar']);

    $conn = connect();
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}

//ubah produk
function ubah($data, $img)
{
    $conn = connect();

    $id = $data['id'];
    $title = htmlspecialchars($data['inputTitle']);
    $writter = htmlspecialchars($data['inputWritter']);
    $publisher = htmlspecialchars($data['inputPublisher']);
    $published = htmlspecialchars($data['inputPublished']);

    $old_img = htmlspecialchars($data['old_img']);

    if (empty($img)) {
        $image = $old_img;
    } else {
        $image = $img;
    }

    $query = "UPDATE buku SET judul = '$title', penulis = '$writter', penerbit = '$publisher', tahun_terbit = '$published', gambar = '$image' WHERE id = $id ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// upload gambar
function uploadImage($url, $data, $action)
{

    $imgFile = $_FILES['img']['name'];
    $tmp_dir = $_FILES['img']['tmp_name'];
    $imgSize = $_FILES['img']['size'];

    if (empty($imgFile)) {
        if ($action == 'edit-product') {
            ubah($data, '');
        }
    } else {
        $upload_dir = $url; // upload directory
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
        // rename uploading image
        if ($action == 'upload-product' || $action == 'edit-product') {
            $imgName = substr($data['inputTitle'], 0, 3) . rand(1000, 1000000) . "." . $imgExt;
        }

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($imgSize < 5000000) {

                if ($action == 'upload-product') {
                    tambah($data, $imgName);
                }

                if ($action == 'edit-product') {
                    unlink($upload_dir . $data['old_img']);
                    ubah($data, $imgName);
                }

                move_uploaded_file($tmp_dir, $upload_dir . $imgName);
            } else {
                return "tooLarge";
            }
        } else {
            return "notImage";
        }
    }
    return "success";
}
