-- Buat Database
CREATE DATABASE sipepe;
USE sipepe;

-- Tabel toko
CREATE TABLE toko (
    id_toko INT AUTO_INCREMENT PRIMARY KEY,
    nama_toko VARCHAR(100) NOT NULL
);

-- Tabel barang
CREATE TABLE barang (
    id_barang INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    harga INT NOT NULL
);

-- Tabel pengiriman
CREATE TABLE pengiriman (
    id_pengiriman INT AUTO_INCREMENT PRIMARY KEY,
    id_toko INT NOT NULL,
    tgl_kirim DATE NOT NULL,
    nota_kirim VARCHAR(255),
    total_pengiriman INT NOT NULL,

    FOREIGN KEY (id_toko) REFERENCES toko(id_toko)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Tabel detail_pengiriman
CREATE TABLE detail_pengiriman (
    id_detail_pengiriman INT AUTO_INCREMENT PRIMARY KEY,
    id_pengiriman INT NOT NULL,
    id_barang INT NOT NULL,
    exp_date DATE,
    jumlah_kirim INT NOT NULL,

    FOREIGN KEY (id_pengiriman) REFERENCES pengiriman(id_pengiriman)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    FOREIGN KEY (id_barang) REFERENCES barang(id_barang)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Tabel pembayaran
CREATE TABLE pembayaran (
    id_pembayaran INT AUTO_INCREMENT PRIMARY KEY,
    id_pengiriman INT NOT NULL,
    tgl_pembayaran DATE NOT NULL,
    nominal_pembayaran INT NOT NULL,

    FOREIGN KEY (id_pengiriman) REFERENCES pengiriman(id_pengiriman)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Tabel retur
CREATE TABLE retur (
    id_retur INT AUTO_INCREMENT PRIMARY KEY,
    id_detail_pengiriman INT NOT NULL,
    jumlah_retur INT NOT NULL,

    FOREIGN KEY (id_detail_pengiriman) REFERENCES detail_pengiriman(id_detail_pengiriman)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Tabel info_pengiriman
CREATE TABLE info_pengiriman (
    id_pengiriman_info INT AUTO_INCREMENT PRIMARY KEY,
    id_toko INT NOT NULL,
    hari VARCHAR(10),
    jam_mulai TIME,
    jam_selesai TIME,

    FOREIGN KEY (id_toko) REFERENCES toko(id_toko)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Tabel info_penagihan
CREATE TABLE info_penagihan (
    id_penagihan INT AUTO_INCREMENT PRIMARY KEY,
    id_toko INT NOT NULL,
    hari VARCHAR(10),
    jam_mulai TIME,
    jam_selesai TIME,

    FOREIGN KEY (id_toko) REFERENCES toko(id_toko)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);