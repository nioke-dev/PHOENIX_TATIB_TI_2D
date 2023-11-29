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
});
