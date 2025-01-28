<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Array</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container" style=" width: 100%; height: 30px; background-color: yellow;">Daftar Nilai</div>
    <div class="table">
        <table style="border: 2px;">
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>Nilai</th>
                <th>Hasil</th>
            </tr>
            <?php
            $data = '[
	{
		"nama" : "Pelita",
		"kelas" : "Laravel",
		"alamat" : "Bandung",
		"tanggal_lahir" : "1997-12-27",
		"nilai" : 90
	},
	{
		"nama" : "Najmina",
		"kelas" : "Vue JS",
		"alamat" : "Jakarta",
		"tanggal_lahir" : "1998-10-07",
		"nilai" : 55
	},
	{
		"nama" : "Anita",
		"kelas" : "Design",
		"alamat" : "Semarang",
		"tanggal_lahir" : "1999-08-20",
		"nilai" : 80
	},
	{
		"nama" : "Bayu",
		"kelas" : "Digital Marketing",
		"alamat" : "Bandung",
		"tanggal_lahir" : "1990-01-01",
		"nilai" : 65
	},
	{
		"nama" : "Nasa",
		"kelas" : "UI/UX Designer",
		"alamat" : "Bandung",
		"tanggal_lahir" : "1995-04-10",
		"nilai" : 70
	},
	{
		"nama" : "Rahma",
		"kelas" : "Node JS",
		"alamat" : "Yogyakarta",
		"tanggal_lahir" : "1993-09-15",
		"nilai" : 85
	}
]';
            //decode untuk menterjemahkan json ke php
            $data1 = json_decode($data);
            foreach ($data1 as $key => $val) {
                if ($val->nilai >=90){
                    $hasil = "A+";
                } elseif ($val->nilai >=80) {
                    $hasil = "A";
                } elseif($val->nilai >=70) {
                    $hasil = "B";
                } elseif ($val->nilai >= 60){
                    $hasil = "C";
                } else {
                    $hasil = "D";
                }
                //datetime untuk membuat variable waktu sekarang
                $tanggal_sekarang = new DateTime();
                //menghitung umur menggunakan datetime library php
                $umur = $tanggal_sekarang->diff(new DateTime($val->tanggal_lahir))->y;
                echo "<tr>";
                echo "<td>" . ++$key . "</td>";
                echo "<td>" . $val->nama . "</td>";
                echo "<td>" . $val->tanggal_lahir . "</td>";
                echo "<td>" . $umur . "</td>";
                echo "<td>" . $val->alamat . "</td>";
                echo "<td>" . $val->kelas . "</td>";
                echo "<td>" . $val->nilai . "</td>";
                echo "<td>" . $hasil . "</td>";
                echo "</tr>";
            }
            ?>
    </div>
    </table>
</body>

</html>