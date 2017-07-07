<script>
    var facility = [];
    var sorting = 1;
    var keyword= '<?= $_GET['keyword'] ?>';
    var category = '<?= $_GET['category'] ?>';

    $(".sorting").change(function(){
        sorting = $(this).val();
        //alert(sorting);
        filter();
    });
    function insertFacility(x){
        if ($('#facil_'+x).is(":checked"))
        {
            facility.push(x);
            filter();
            //alert(x);
            console.log ( facility );
        }else{
            position = facility.indexOf(x);
            facility.splice(position, 1);
            filter();
            console.log ( facility );
        }
    }

    function filter(){
        $("#result").slideUp();
        $("#loading").show();
        setTimeout(function(){
            $.post(
                "ajaxSearch",
                { facility: facility, sorting: sorting, keyword:keyword, category:category}
            ).success(function(data){
                $("#result").empty().html(data);
                $("#loading").hide();
                $("#result").slideDown();

            });
        }, 1000);

    }
</script>