<?php 
    $conn = mysqli_connect("localhost", "root", "", "Modul3"); //debug

    if(!$conn) {
		die("Database tidak ada : ".mysql_connect_error());
    }
    
    function query($query){
        global $conn;

        $res = mysqli_query($conn, $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($res)){
            $rows [] = $row;
        }
        return $rows;
    }

    function addData($data){
            global $conn;
            $rs_row = query("SELECT * FROM Buku_table");

            $id = strval(rand(100,999));
            $judul_buku = $data['Judul_buku'];
            $penulis_buku = $data['Penulis_buku'];
            $tahun_terbit = $data['Tahun_terbit'];
            $deskripsi = $data['deskripsi'];
            $filename = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = './uploads/';
            move_uploaded_file($source, $folder.$filename);
            $bahasa = $data['bahasa'];
            $tag = $_POST['tag'];
            if($tag==0){
                $tagss='Nothing';
            }else{
                $tagss = implode(", ", $tag);
            }
            

            $query = "INSERT INTO Buku_table VALUES('$id','$judul_buku','$penulis_buku','$tahun_terbit','$deskripsi','$cc','$bahasa',
            '$tag')";

            mysqli_query($conn, $query);
            $eff_rw = mysqli_affected_rows($conn);

            if($eff_rw>0){
                echo "
                <script> 
                    alert('Berhasil Ditamabhkan ke Database');
                    document.location.href = 'Ara_Home.php';
                </script>
                ";
            } else {
                echo "
                <script> 
                alert('Tidak ada data yang ditambahkan!!');
                document.location.href = 'Ara_Home.php';
            </script>
            ";
            }
    }

    function delData($key_item){ 
        global $conn;
        query("DELETE FROM Buku_table WHERE id = '$key_item'");
        $eff_rw = mysqli_affected_rows($conn);
        
        if($eff_rw>0) {
            echo "
            <script>
                alert('Event deleted!!');
                document.location.href = 'home_event.php';
            </script>
        ";
        } else {
            echo "
            <script>
                alert('Event not deleted');
                document.location.href = 'home_event.php';
            </script>
        ";
        }
    }

    ?>