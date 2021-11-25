# proyekPW
tabel user
- id_user
- username
- password
- phone
- email


tabel order
- id_order
- id_user
- id_sepatu
- harga_total
- tanggal_order
- status

tabel sepatu
- id_sepatu
- nama sepatu
- ukuran
- warna
- gender
- category
- stok
- harga

tabel images
- id_images
- id_sepatu
- filename
- index

1. Admin:
- master barang (done)
- update info status pemesanan
- laporan (tentukan 5 laporan minimal) 
- diskon (buat minimal 3 jenis diskon) (done)

2. Pembeli
- search (done)
- advanced search (done)
- wishlish
- add to cart
- checkout 
- pembayaran -- dengan payment gateway
- history transaksi 
- tracking status pembelian
- review
- ratting
- view detail product (done)
- view ratting dan review 
- login dan register (done)