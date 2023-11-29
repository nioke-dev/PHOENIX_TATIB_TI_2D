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

  $(".tampilModalUbah").on("click", function () {
    $("#formModalLabel").html("Ubah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/PHOENIX_TATIB_TI_2D/public/mahasiswa/ubah"
    );

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/PHOENIX_TATIB_TI_2D/public/mahasiswa/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nim").val(data.nim);
        $("#nama").val(data.nama);
        $("#kelas").val(data.kelas);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
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
    $("#nama_matkul").val("");
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
        $("#nama_matkul").val(data.matkul);
        $("#id_matkul").val(data.id_matkul);
      },
    });
  });
});
