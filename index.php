<html>
   <head>
      <title>Menampilkan Data Tabel MySQL Dengan mysqli_fetch_array</title>
      <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
   </head>
   <body>
      <h3>Tabel barang (mysqli_fetch_array)</h3>
      <table>
         <thead>
            <tr>
               <th>id barang</th> 
               <th>id member</th> 
               <th>nama barang</th>
               <th>stok barang</th>         
            </tr>
         </thead>
         <?php
            include 'koneksi.php';		
            $sql = 'SELECT  * FROM barang';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['id_barang'] ?></td>
               <td><?php echo $row['id_member'] ?></td>
               <td><?php echo $row['nama_barang'] ?></td>
               <td><?php echo $row['stok_barang'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      <h3>Tabel kasir (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>id kasir</th>
               <th>nama kasir</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM kasir';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Tabel transaksi (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>No transaksi</th>
               <th>id barang</th>
               <th>id kasir</th>
               <th>tgl transaksi</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM transaksi';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
               <td><?php echo $row[3] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Inner Join (mysqli_fetch_assoc)</h3>
      <h4> (menampilkan semua data barang dari tabel barang yang melakukan transaksi)</h4>
      <table>
         <thead>
            <tr>
               <th>id barang</th>
               <th>no transaksi</th>
               <th>tanggal transaksi</th>
            </tr>
         </thead>
         <?php
            'SELECT *
            FROM barang 
            INNER JOIN transaksi
            ON barang.id_barang = transaksi.no_transaksi';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['id_barang'] ?></td>
               <td><?php echo $row['no_transaksi'] ?></td>
               <td><?php echo $row['tgl_transaksi'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      </table>
      <h3>Left Outer Join </h3>
      <h4> (menampilkan semua data barang dari tabel barang yang melakukan transaksi)</h4>
      <table>
         <thead>
            <tr>
               <th>id barang</th>
               <th>no transaksi</th>
               <th>tanggal transaksi</th>
            </tr>
         </thead>
         <?php
            'SELECT *
            FROM barang 
            LEFT JOIN transaksi
            ON member.id_barang = transaksi.no_transaksi';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
              <td><?php echo $row['id_barang'] ?></td>
               <td><?php echo $row['no_transaksi'] ?></td>
               <td><?php echo $row['tgl_transaksi'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
   </body>
</html>