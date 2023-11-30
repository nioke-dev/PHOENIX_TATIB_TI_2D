$(function () {
  // Dosen Function
  $(".tombolTambahDataDosen").on("click", function () {
    $("#formModalDosenLabel").html("Tambah Data Dosen");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nip").val("");
    $("#nama").val("");
    $("#email").val("");
    $("#password").val("");
    $("#matkul").val("");
  });

  $(".tampilModalUbahDosen").on("click", function () {
    $("#formModalDosenLabel").html("Ubah Data Dosen");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/dosen/ubah"
    );

    const nip_dosen = $(this).data("nip_dosen");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/dosen/getubah",
      data: { nip_dosen: nip_dosen },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nip").val(data.nip_dosen);
        $("#nama").val(data.nama_dosen);
        $("#email").val(data.email_dosen);
        $("#password").val(data.password);
        $("#id_user").val(data.id_user);
        $("#password").attr("type", "text");
      },
    });
  });

  $(".tampilModalDetail").on("click", function () {
    $("#detailModalDosenLabel").html("Detail Data Dosen");

    const nip_dosen = $(this).data("nip_dosen");
    console.log("nip_dosen:", nip_dosen);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/dosen/detail",
      data: { nip_dosen: nip_dosen },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailNip").text(data.nip_dosen);
        $("#detailNama").text(data.nama_dosen);
        $("#detailEmail").text(data.email_dosen);
        $("#detailUsername").text(data.username);
        $("#detailPassword").text(data.password);
        // Menangani hasil yang mungkin merupakan kumpulan matkul
        if (data.matkul) {
          $("#detailMatkul").text(data.matkul);
        } else {
          $("#detailMatkul").text("Tidak ada matkul");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  // Matkul Function

  $(".tombolTambahDataMatkulDosen").on("click", function () {
    $("#formModalMatkulDosenLabel").html("Tambah Data Matkul Dosen");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nip_dosen").val("");
    $("#matkul").val("");
  });

  $(".tampilModalUbahMatkul").on("click", function () {
    $("#formModalMatkulDosenLabel").html("Ubah Data Matkul Dosen");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/matkul/ubah"
    );

    const id_matkul = $(this).data("id_matkul");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/matkul/getubah",
      data: { id_matkul: id_matkul },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#nip_dosen").val(data.nip_dosen);
        $("#matkul").val(data.matkul);
        $("#id_matkul").val(data.id_matkul);
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
    $("#password").val("");
  });

  $(".tampilModalDetailMahasiswa").on("click", function () {
    $("#detailModalMahasiswaLabel").html("Detail Data Mahasiswa");

    const nim_mahasiswa = $(this).data("nim_mahasiswa");
    console.log(nim_mahasiswa);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/mahasiswa/detail",
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
        $("#detailPasswordMahasiswa").text(data.password);
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  });

  $(".tampilModalUbahMahasiswa").on("click", function () {
    $("#formModalMahasiswaLabel").html("Ubah Data Mahasiswaaaa");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/mahasiswa/ubah"
    );

    const nim_mahasiswa = $(this).data("nim_mahasiswa");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/mahasiswa/getubah",
      data: { nim_mahasiswa: nim_mahasiswa },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nim_mahasiswa").val(data.nim_mahasiswa);
        $("#nama_mahasiswa").val(data.nama_mahasiswa);
        $("#kelas_mahasiswa").val(data.kelas_mahasiswa);
        $("#prodi_mahasiswa").val(data.prodi_mahasiswa);
        $("#email_mahasiswa").val(data.email_mahasiswa);
        $("#password").val(data.password);
        $("#nim_mahasiswa_lama").val(data.nim_mahasiswa);
        $("#nama_mahasiswa_lama").val(data.nama_mahasiswa);
        $("#kelas_mahasiswa_lama").val(data.kelas_mahasiswa);
        $("#prodi_mahasiswa_lama").val(data.prodi_mahasiswa);
        $("#email_mahasiswa_lama").val(data.email_mahasiswa);
        $("#password_lama").val(data.password);
        $("#id_user").val(data.id_user);
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
    $("#email_dpa").val("");
    $("#password").val("");
  });

  $(".tampilModalDetailDpa").on("click", function () {
    $("#detailModalDpaLabel").html("Detail Data DPA");

    const nip_dpa = $(this).data("nip_dpa");
    console.log(nip_dpa);

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/dpa/detail",
      data: { nip_dpa: nip_dpa },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#detailNipDpa").text(data.nip_dpa);
        $("#detailNamaDpa").text(data.nama_dpa);
        $("#detailKelasDpa").text(data.kelas_dpa);
        $("#detailEmailDpa").text(data.email_dpa);
        $("#detailPasswordDpa").text(data.password);
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
      "http://localhost/PHOENIX_TATIB_TI_2D/public/dpa/ubah"
    );

    const nip_dpa = $(this).data("nip_dpa");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/dpa/getubah",
      data: { nip_dpa: nip_dpa },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log("Respons Server:", data);
        $("#nip_dpa").val(data.nip_dpa);
        $("#nama_dpa").val(data.nama_dpa);
        $("#kelas_dpa").val(data.kelas_dpa);
        $("#email_dpa").val(data.email_dpa);
        $("#password").val(data.password);
        $("#nip_dpa_lama").val(data.nip_dpa);
        $("#nama_dpa_lama").val(data.nama_dpa);
        $("#kelas_dpa_lama").val(data.kelas_dpa);
        $("#email_dpa_lama").val(data.email_dpa);
        $("#password_lama").val(data.password);
        $("#id_user").val(data.id_user);
      },
    });
  });

  // ... (fungsi-fungsi lainnya)
});
