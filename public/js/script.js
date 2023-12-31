const baseurl = "http://localhost/PHOENIX_TATIB_TI_2D/public";
$(function () {
  // Admin Role

  // Dosen Function
  $(".tombolTambahDataDosen").on("click", function () {
    $("#formModalDosenLabel").html("Tambah Data Dosen");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nip").val("");
    $("#nama").val("");
    $("#email").val("");
  });

  $(".tampilModalUbahDosen").on("click", function () {
    $("#formModalDosenLabel").html("Ubah Data Dosen");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/dosen/ubah"
    );

    const nip_dosen = $(this).data("nip_dosen");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/dosen/getubah",
      data: { nip_dosen: nip_dosen },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nip").val(data.nip_dosen);
        $("#nama").val(data.nama_dosen);
        $("#email").val(data.email_dosen);
        $("#nip_lama").val(data.nip_dosen);
        $("#nama_lama").val(data.nama_dosen);
        $("#email_lama").val(data.email_dosen);
        $("#id_user").val(data.id_user);
      },
    });
  });

  $(".tampilModalDetail").on("click", function () {
    $("#detailModalDosenLabel").html("Detail Data Dosen");

    const nip_dosen = $(this).data("nip_dosen");
    console.log("nip_dosen:", nip_dosen);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/dosen/detail",
      data: { nip_dosen: nip_dosen },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailNip").text(data.nip_dosen);
        $("#detailNama").text(data.nama_dosen);
        $("#detailEmail").text(data.email_dosen);
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  // Mahasiswa Function
  $(".tombolTambahDataMahasiswa").on("click", function () {
    $("#formModalMahasiswaLabel").html("Tambah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nim_mahasiswa").val("");
    $("#nama_mahasiswa").val("");
    $("#kelas_mahasiswa").val("");
    $("#prodi_mahasiswa").val("");
    $("#email_mahasiswa").val("");
  });

  $(".tampilModalDetailMahasiswa").on("click", function () {
    $("#detailModalMahasiswaLabel").html("Detail Data Mahasiswa");

    const nim_mahasiswa = $(this).data("nim_mahasiswa");
    console.log(nim_mahasiswa);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/mahasiswa/detail",
      data: { nim_mahasiswa: nim_mahasiswa },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailNimMahasiswa").text(data.nim_mahasiswa);
        $("#detailNamaMahasiswa").text(data.nama_mahasiswa);
        $("#detailKelasMahasiswa").text(data.kelas_mahasiswa);
        $("#detailProdiMahasiswa").text(data.prodi_mahasiswa);
        $("#detailEmailMahasiswa").text(data.email_mahasiswa);
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  $(".tampilModalUbahMahasiswa").on("click", function () {
    $("#formModalMahasiswaLabel").html("Ubah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/mahasiswa/ubah"
    );

    const nim_mahasiswa = $(this).data("nim_mahasiswa");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/mahasiswa/getubah",
      data: { nim_mahasiswa: nim_mahasiswa },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nim_mahasiswa").val(data.nim_mahasiswa);
        $("#nama_mahasiswa").val(data.nama_mahasiswa);
        $("#kelas_mahasiswa").val(data.kelas_mahasiswa);
        $("#prodi_mahasiswa").val(data.prodi_mahasiswa);
        $("#email_mahasiswa").val(data.email_mahasiswa);
        $("#nim_mahasiswa_lama").val(data.nim_mahasiswa);
        $("#nama_mahasiswa_lama").val(data.nama_mahasiswa);
        $("#kelas_mahasiswa_lama").val(data.kelas_mahasiswa);
        $("#prodi_mahasiswa_lama").val(data.prodi_mahasiswa);
        $("#email_mahasiswa_lama").val(data.email_mahasiswa);
        $("#id_user").val(data.id_user);
      },
    });
  });

  // Admin Function
  $(".tombolTambahDataAdmin").on("click", function () {
    $("#formModalAdminLabel").html("Tambah Data Admin");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nip_admin").val("");
    $("#nama_admin").val("");
    $("#email_admin").val("");
  });

  $(".tampilModalUbahAdmin").on("click", function () {
    $("#formModalAdminLabel").html("Ubah Data Admin");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/admin/ubah"
    );

    const nip_admin = $(this).data("nip_admin");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/admin/getubah",
      data: { nip_admin: nip_admin },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#nip_admin").val(data.nip_admin);
        $("#nama_admin").val(data.nama_admin);
        $("#email_admin").val(data.email_admin);
        $("#nip_admin_lama").val(data.nip_admin);
        $("#nama_admin_lama").val(data.nama_admin);
        $("#email_admin_lama").val(data.email_admin);
        $("#id_user").val(data.id_user);
      },
    });
  });

  $(".tampilModalDetailAdminAdminRole").on("click", function () {
    $("#detailModalAdminLabel").html("Detail Data Admin");

    const nip_admin = $(this).data("nip_admin");
    console.log("nip_admin:", nip_admin);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/admin/detail",
      data: { nip_admin: nip_admin },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailNipAdmin").text(data.nip_admin);
        $("#detailNamaAdmin").text(data.nama_admin);
        $("#detailEmailAdmin").text(data.email_admin);
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  // DPA Function
  $(".tombolTambahDataDpa").on("click", function () {
    $("#formModalDpaLabel").html("Tambah Data DPA");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nip_dpa").val("");
    $("#nama_dpa").val("");
    $("#kelas_dpa").val("");
    $("#prodi_dpa").val("");
    $("#email_dpa").val("");
  });

  $(".tampilModalDetailDpa").on("click", function () {
    $("#detailModalDpaLabel").html("Detail Data DPA");

    const nip_dpa = $(this).data("nip_dpa");
    console.log(nip_dpa);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/dpa/detail",
      data: { nip_dpa: nip_dpa },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailNipDpa").text(data.nip_dpa);
        $("#detailNamaDpa").text(data.nama_dpa);
        $("#detailKelasDpa").text(data.kelas_dpa);
        $("#detailEmailDpa").text(data.email_dpa);
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  $(".tampilModalUbahDpa").on("click", function () {
    $("#formModalDpaLabel").html("Ubah Data DPA");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/dpa/ubah"
    );

    const nip_dpa = $(this).data("nip_dpa");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/dpa/getubah",
      data: { nip_dpa: nip_dpa },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#nip_dpa_ubah").val(data.nip_dpa);
        $("#nama_dpa").val(data.nama_dpa);
        $("#kelas_dpa_ubah").val(data.kelas_dpa);
        $("#email_dpa").val(data.email_dpa);
        $("#nip_dpa_lama").val(data.nip_dpa);
        $("#nama_dpa_lama").val(data.nama_dpa);
        $("#kelas_dpa_ubah_Lama").val(data.kelas_dpa);
        $("#email_dpa_lama").val(data.email_dpa);
        $("#id_user").val(data.id_user);
      },
    });
  });

  // Tatib Function
  $(".tombolTambahDataTatib").on("click", function () {
    $("#formModalTatibLabel").html("Tambah Data Tatib");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#deskripsi").val("");
    $("#id_tingkatSanksi").val("");
    $("#tatib").val("");
  });

  $(".tampilModalUbahTatib").on("click", function () {
    $("#formModalTatibLabel").html("Ubah Data Tatib");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/tatib/ubah"
    );

    const id_tatib = $(this).data("id_tatib");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/tatib/getubah",
      data: { id_tatib: id_tatib },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#deskripsi").val(data.deskripsi);
        $("#deskripsiLama").val(data.deskripsi);
        $("#id_tingkatSanksi").val(data.id_tingkatSanksi);
        $("#id_tingkatSanksiLama").val(data.id_tingkatSanksi);
        $("#id_tatib").val(data.id_tatib);
      },
    });
  });

  $(".tampilModalDetailTatib").on("click", function () {
    $("#detailModalTatibLabel").html("Detail Data Tatib");

    const id_tatib = $(this).data("id_tatib");
    console.log("id_tatib:", id_tatib);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/tatib/getubah",
      data: { id_tatib: id_tatib },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailTingkatSanksi").text(data.tingkat_sanksi);
        $("#id_tatib").text(data.id_tatib);

        if (data.tatib) {
          $("#detailTatib").text(data.tatib);
        } else {
          $("#detailTatib").text("Tidak ada tatib");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  // Mahasiswa Melanggar Function
  $(".tampilModalDetailMahasiswaMelanggar").on("click", function () {
    $("#detailModalMahasiswaMelanggarLabel").html(
      "Detail Data Mahasiswa Melanggar"
    );

    const nim_mahasiswa = $(this).data("nim_mahasiswa");
    console.log(nim_mahasiswa);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/mahasiswaMelanggar/detail",
      data: { nim_mahasiswa: nim_mahasiswa },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailProdiMahasiswaMelanggar").text(data.prodi_mahasiswa);
        $("#detailEmailMahasiswaMelanggar").text(data.email_mahasiswa);
        $("#detailJumlahPelanggaranMahasiswaMelanggar").text(
          data.jumlahPelanggaran
        );
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailBuktiLaporan").attr(
          "src",
          baseurl + "/img/bukti_laporan/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
  $(".tampilModalDetailLaporanDpaRole").on("click", function () {
    $("#detailModalMahasiswaMelanggarLabel").html(
      "Detail Data Mahasiswa Melanggar"
    );

    const id_laporan = $(this).data("id_laporan");
    console.log(id_laporan);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/DpaControllers/rekapLaporan/detail",
      data: { id_laporan: id_laporan },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailIdLaporan").text(data.id_laporan);
        $("#detailNimMahasiswa").text(data.nim_mahasiswa);
        $("#detailNamaMahasiswa").text(data.nama_mahasiswa);
        $("#detailKelasMahasiswa").text(data.kelas_mahasiswa);
        $("#detailNipDosen").text(data.nip_dosen);
        $("#detailNamaDosen").text(data.nama_dosen);
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailTataTertib").text(data.deskripsiTatib);
        $("#detailTingkatSanksi").text(data.tingkat_sanksi);
        $("#detailBuktiLaporan").attr(
          "src",
          baseurl + "/img/bukti_laporan/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  $(".tampilModalUbahMahasiswaMelanggar").on("click", function () {
    $("#formModalMahasiswaLabel").html("Ubah Data Mahasiswa Melanggar");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/mahasiswaMelanggar/ubah"
    );

    const nim_mahasiswa = $(this).data("nim_mahasiswa");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/mahasiswaMelanggar/getubah",
      data: { nim_mahasiswa: nim_mahasiswa },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#id_tingkatSanksi").val(data.id_tingkatSanksi);
        $("#id_tingkatSanksiLama").val(data.id_tingkatSanksi);
        $("#nim_mahasiswa").val(data.nim_mahasiswa);
      },
    });
  });

  // Laporan Dosen
  // laporan Function
  $(".tombolTambahDataLaporan").on("click", function () {
    // Mengganti konten modal dan mereset nilai input
    $("#formModalLaporanLabel").html("Tambah Data Laporan");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nim_mahasiswa").val("");
    $("#nama_mahasiswa").val("");
    $("#kelas_mahasiswa").val("");
    $("#tingkat_sanksi").val("");
    $("#deskripsi").val("");
  });

  $(".tampilModalDetailLaporan").on("click", function () {
    console.log("Clicked Detail"); // Pastikan event click terpanggil

    $("#detailModalLaporanLabel").html("Detail Data Laporan");

    const id_laporan = $(this).data("id_laporan");
    console.log(id_laporan);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/DosenControllers/laporan/detail",
      data: { id_laporan: id_laporan },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);

        // Pastikan ID elemen sesuai dengan elemen yang ada di HTML
        $("#detailIdLaporan").text(data.id_laporan);
        $("#detailNimMahasiswa").text(data.nim_mahasiswa);
        $("#detailNamaMahasiswa").text(data.nama_mahasiswa);
        $("#detailKelasMahasiswa").text(data.kelas_mahasiswa);
        $("#detailNipDosen").text(data.nip_dosen);
        $("#detailNamaDosen").text(data.nama_dosen);
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailTataTertib").text(data.deskripsiTatib);
        $("#detailTingkatSanksi").text(data.tingkat_sanksi);
        $("#detailBuktiLaporan").attr(
          "src",
          baseurl + "/img/bukti_laporan/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
  $(".tampilModalDetailLaporanDpaRoleMenuDosen").on("click", function () {
    console.log("Clicked Detail"); // Pastikan event click terpanggil

    $("#detailModalLaporanLabel").html("Detail Data Laporan");

    const id_laporan = $(this).data("id_laporan");
    console.log(id_laporan);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/DpaControllers/laporan/detail",
      data: { id_laporan: id_laporan },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);

        // Pastikan ID elemen sesuai dengan elemen yang ada di HTML
        $("#detailIdLaporan").text(data.id_laporan);
        $("#detailNimMahasiswa").text(data.nim_mahasiswa);
        $("#detailNamaMahasiswa").text(data.nama_mahasiswa);
        $("#detailKelasMahasiswa").text(data.kelas_mahasiswa);
        $("#detailNipDosen").text(data.nip_dosen);
        $("#detailNamaDosen").text(data.nama_dosen);
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailTataTertib").text(data.deskripsiTatib);
        $("#detailTingkatSanksi").text(data.tingkat_sanksi);
        $("#detailBuktiLaporan").attr(
          "src",
          baseurl + "/img/bukti_laporan/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  $(".tampilModalDetailLaporanAdminRole").on("click", function () {
    console.log("Clicked Detail"); // Pastikan event click terpanggil

    $("#detailModalLaporanLabel").html("Detail Data Laporan");

    const id_laporan = $(this).data("id_laporan");
    console.log(id_laporan);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/laporan/detail",
      data: { id_laporan: id_laporan },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);

        // Pastikan ID elemen sesuai dengan elemen yang ada di HTML
        $("#detailIdLaporan").text(data.id_laporan);
        $("#detailNimMahasiswa").text(data.nim_mahasiswa);
        $("#detailNamaMahasiswa").text(data.nama_mahasiswa);
        $("#detailKelasMahasiswa").text(data.kelas_mahasiswa);
        $("#detailNipDosen").text(data.nip_dosen);
        $("#detailNamaDosen").text(data.nama_dosen);
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailTataTertib").text(data.deskripsiTatib);
        $("#detailTingkatSanksi").text(data.tingkat_sanksi);
        $("#detailBuktiLaporan").attr(
          "src",
          baseurl + "/img/bukti_laporan/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  $(".tampilModalUploadSuratSanksi").on("click", function () {
    $("#detailModalKerjakanSanksiLabel").html("Detail Data Laporan");
    const id_laporan = $(this).data("id_laporan");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/MahasiswaControllers/pelanggaran/detail",
      data: { id_laporan: id_laporan },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Serverr:", data);
        // Pastikan ID elemen sesuai dengan elemen yang ada di HTML
        $("#id_laporanKerjakanSanksi").val(data.id_laporan);
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  $(".tampilModalUploadSuratSanksiKhusus").on("click", function () {
    $("#detailModalKerjakanSanksiLabel").html("Detail Data Laporan");
    const id_laporan = $(this).data("id_laporan");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/MahasiswaControllers/pelanggaran/detail",
      data: { id_laporan: id_laporan },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Serverr:", data);
        // Pastikan ID elemen sesuai dengan elemen yang ada di HTML
        $("#id_laporanKerjakanSanksiKhusus").val(data.id_laporan);
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  // Mahasiswa -> laporan -> Detail
  $(".tampilModalDetailPelanggaran").on("click", function () {
    console.log("Clicked Detail"); // Pastikan event click terpanggil

    $("#detailModalPelanggaranLabel").html("Detail Data Laporan Pelanggaran");

    const id_laporan = $(this).data("id_laporan");
    console.log(id_laporan);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/MahasiswaControllers/pelanggaran/detail",
      data: { id_laporan: id_laporan },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);

        // Pastikan ID elemen sesuai dengan elemen yang ada di HTML
        $("#detailDeskripsiMahasiswaMelanggar").text(data.deskripsi);
        $("#detailTatibMahasiswaMelanggar").text(data.deskripsiTatib);
        $("#detailBuktiLaporan").attr(
          "src",
          baseurl + "/img/bukti_laporan/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  //function banding
  $(".tampilTambahDataBanding").on("click", function () {
    $("#formModalBandingLabel").html("Ajukan Banding");
    $(".modal-footer button[type=submit]").html("Ajukan Banding");

    const id_laporan = $(this).data("id_laporan");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/MahasiswaControllers/banding/getTambahBanding",
      data: { id_laporan: id_laporan },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#id_laporan").val(data.id_laporan);
      },
    });
  });

  $(".tampilModalDetailBandingMahasiswaRole").on("click", function () {
    console.log("Clicked Detail");

    $("#detailModalBandingLabel").html("Detail Data Banding");

    const id_banding = $(this).data("id_banding");
    console.log(id_banding);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/MahasiswaControllers/banding/detail",
      data: { id_banding: id_banding },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailBuktiBanding").attr(
          "src",
          baseurl + "/img/bukti_banding/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
  $(".tampilModalDetailBandingDosenRole").on("click", function () {
    console.log("Clicked Detail");

    $("#detailModalBandingLabel").html("Detail Data Banding");

    const id_banding = $(this).data("id_banding");
    console.log(id_banding);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/DosenControllers/banding/detail",
      data: { id_banding: id_banding },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailBuktiBanding").attr(
          "src",
          baseurl + "/img/bukti_banding/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
  $(".tampilModalDetailBandingAdminRole").on("click", function () {
    console.log("Clicked Detail");

    $("#detailModalBandingLabel").html("Detail Data Banding");

    const id_banding = $(this).data("id_banding");
    console.log(id_banding);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/AdminControllers/banding/detail",
      data: { id_banding: id_banding },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailNamaDosen").text(data.nama_dosen);
        $("#detailNamaMahasiswa").text(data.nama_mahasiswa);
        $("#detailBuktiBanding").attr(
          "src",
          baseurl + "/img/bukti_banding/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
  $(".tampilModalDetailBandingDpaRole").on("click", function () {
    console.log("Clicked Detail");

    $("#detailModalBandingLabel").html("Detail Data Banding");

    const id_banding = $(this).data("id_banding");
    console.log(id_banding);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/DpaControllers/banding/detail",
      data: { id_banding: id_banding },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailDeskripsi").text(data.deskripsi);
        $("#detailBuktiBanding").attr(
          "src",
          baseurl + "/img/bukti_banding/" + data.file_bukti
        );
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });
  // ... (fungsi-fungsi lainnya)
});
$("#formModalLaporan").on("shown.bs.modal", function () {
  $(".select-mahasiswa-laporkan").select2({
    dropdownParent: $("#formModalLaporan"),
  });
  $(".select-tatib-tingkatSanksi").select2({
    dropdownParent: $("#formModalLaporan"),
  });
  $(".select-dosen-adminRole").select2({
    dropdownParent: $("#formModalLaporan"),
  });
});
$("#formModalDpa").on("shown.bs.modal", function () {
  $(".select-dosen-adminRole").select2({
    dropdownParent: $("#formModalDpa"),
  });
});
$("#ubahModalLaporan").on("shown.bs.modal", function () {
  $(".select-tatib-tingkatSanksi-ubah").select2({
    dropdownParent: $("#ubahModalLaporan"),
  });
});
