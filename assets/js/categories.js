$(document).ready(function(){

	// Add parent category id in hidden input


$('#category_product_update').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = optionSelected.text();
   $('#category_product_update').parents('form').find('#name_categories').attr('value',valueSelected);

});
});