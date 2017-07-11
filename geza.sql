CREATE TABLE temuan(id int AUTO_INCREMENT PRIMARY KEY,
id_skpd int,
uu varchar(100),
tanggal date,
pendapatan varchar(50),

btl_uraian text,
btl_anggaran varchar(50),
btl_realisasi varchar(50),
btl_spj varchar(50),
btl_sisa varchar(50),

bl_uraian varchar(50),
bl_anggaran varchar(50),
bl_realisasi varchar(50),
bl_spj varchar(50),
bl_sisa varchar(50),

jenis varchar(50),
nama varchar(50),
nilai varchar(50),

spm_tanggal date,
spm_up varchar(50),
spm_gu varchar(50),
spm_tu varchar(50),
spm_gaji varchar(50),
spm_barjas varchar(50),

spp_tanggal date,
spp_up varchar(50),
spp_gu varchar(50),
spp_tu varchar(50),
spp_gaji varchar(50),
spp_barjas varchar(50),

tj_tanggal date,
no_spj varchar(50),
jumlah varchar(50));


CREATE TABLE berita(id int AUTO_INCREMENT PRIMARY KEY,
id_temuan int,
tj varchar(50),
ketua varchar(50),
no varchar(50),
ts varchar(50),
uu varchar(50),
tanggal date,
saran varchar(50),
batas date,
status varchar(50));


CREATE TABLE file(id int AUTO_INCREMENT PRIMARY KEY,
id_berita int,
file text);

CREATE TABLE SKPD(id int AUTO_INCREMENT PRIMARY KEY,
nama varchar(50));

CREATE TABLE polling(id int AUTO_INCREMENT PRIMARY KEY,
id_skpd int,
tanggal date,
nilai int)