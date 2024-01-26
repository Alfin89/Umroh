<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
    h1{
      font-size: 30px;
      color: #000000;
      text-transform: uppercase;
      font-weight: 300;
      text-align: center;
      margin-bottom: 15px;
    }
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #696cff;
      color: white;
    }
    </style>
  </head>
  <body>
    
      {{-- Table --}}
        <h1>Laporan Data Pendaftar</h1>
        <table id="customers">
          <tr>
            <th>No</th>
              <th>Nama</th>
              <th>NIK</th>
              <th>Tetala</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Pekerjaan</th>
          </tr>
          <tr>
            @foreach ($pendaftar as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->nik }}</td>
              <td>{{ $item->tempat_lahir }} {{ $item->tanggal_lahir }}</td>
              <td>{{ $item->jenis_kelamin }}</td>
              <td>{{ $item->alamat}}</td>
              <td>{{ $item->nomor_telepon }}</td>
              <td>{{ $item->pekerjaan }}</td>
            </tr>
            @endforeach
          </tr>
        </table>
      {{-- /Table  --}}
  </body>
</html>