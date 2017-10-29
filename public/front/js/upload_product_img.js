$("#save_item_detail").click(function(event) {
    var counter = $("tbody tr").length + 1;
    event.preventDefault();
    $.ajax({
        type: "post",
        url: burl + "/shop-owner/product_img/"+product_id+"/save",
        dataType: "json",
        data: $('form').serialize(),
        success: function(data){
            var row = "<tr id='" + data.id + "'>" +
            '<td>' + counter + '</td>' +
            '<td>' + data.image + '</td>' +
            '<td>' + '<a href="#" onclick="editItemDetail(this, event)" data-toggle="modal" data-target=".bd-example-modal-lg" title="Edit"><i class="fa fa-edit text-success"></i></a>'+ "&nbsp;&nbsp;"+
            '<a href="#" onclick="deleteItem(this, event)" title="Delete"><i class="fa fa-remove text-danger"></i></a>' + '</td>' +
            '<tr>';
            $('tbody').append(row);
            $('form').trigger('reset');
            alert(1);
            $('#success_add_item').text('The new item detail has been created successfully.');
        },
        error: function(data){
            alert('Please check you item price!');
        }
    });
});