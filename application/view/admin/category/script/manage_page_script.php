<script>
    a=function(){
        var e=$("#sample_3"),
            t=e.dataTable({
                language:{
                    aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},
                    emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",
                    infoFiltered:"(filtered1 from _MAX_ total entries)",
                    lengthMenu:"_MENU_ entries",
                    search:"Search:",
                    zeroRecords:"No matching records found"
                },
                buttons:[
                    {extend:"print",className:"btn dark btn-outline"},
                    {extend:"copy",className:"btn red btn-outline"},
                    {extend:"pdf",className:"btn green btn-outline"},
                    {extend:"excel",className:"btn yellow btn-outline "},
                    {extend:"csv",className:"btn purple btn-outline "},
                    {extend:"colvis",className:"btn dark btn-outline",text:"Columns"}
                ],
                responsive:!0,
                order:[[0,"asc"]],
                lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],
                pageLength:10
            });
        $("#sample_3_tools > li > a.tool-action").on("click",function(){
            var e=$(this).attr("data-action");
            t.DataTable().button(e).trigger()
        })
    };
    jQuery(document).ready(function(){
        jQuery().dataTable&&(a());
    });
</script>