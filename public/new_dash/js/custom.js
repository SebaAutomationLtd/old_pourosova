$('.summernote').summernote({
    height: 300
});
$('[data="tooltip"]').tooltip();
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$('.datatable').DataTable();