let SiteUrl = getSiteUrl() ;


$('#users-subscrip_id').on('select2:select', function (e) { 
    let id=$(this).val();
    url = SiteUrl +"/index.php?r=subscription/model&id="+id;
    url=SiteUrl+""+
    $.ajax({
        url: url ,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $("#users-price_subscrip").val(data.price)
        }
    });
});


function getSiteUrl() {
    let site_url=window.location.host;
    if (site_url=='localhost:8080'){
        return '';
    }
    return site_url+'/web';
}