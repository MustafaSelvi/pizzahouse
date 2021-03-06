@extends('layout.master')
@section('title','New Order')
@section('content')   

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <!-- Styles -->
        <style>
                .ui.footer.segment {
    margin: 5em 0em 0em;
    padding: 5em 0em;
  }
  #account-settings-modal .ui.active.tab.segment {
    margin: 20px;
  }
  .gosterme {
    display:none!important;
  }
        </style>
    </head>
    <body>

<div class="ui grid">
    <div class="two wide computer nine wide tablet six wide mobile column">
    </div>

  <div class="eleven wide column" id="dashboard-monitor">
    <div class="ui segment">

                <a href="{{route('orders/new-order-form')}}"> <button  class="ui green compact labeled icon button" style="margin-bottom:20px;" id="new-order-button" value ="Order">
                    <i class="plus icon"></i>
                    New Order
                  </button>
                  </a>

                  <form action="/order" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="ui red compact labeled icon button" style="margin-bottom:20px;" id="deleteAllSelectedRecords">
                      <i class="minus circle icon"></i>
                        Delete Orders
                      </button>
                   </form>        


        <form action="/order"  method="POST">
            @csrf

        <button class="ui blue compact labeled icon button" style="margin-bottom:20px;" id="new-order-button">
        <i class="minus circle icon"></i>
          Update Orders
        </button>
        <button class="ui right floated teal big compact labeled icon button" style="margin-bottom:20px;" id="new-order-button">
        <i class="file pdf outline icon"></i>
          Create + Print Labels
        </button>
    </form>
        <!-- table goes here -->      

        <form id="frm-example" action="/path/to/your/script.php" method="POST">

            <table id="example" class="display" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th><input type="checkbox" id="chkCheckAll"></th>
                     <th>Order ID</th>
                     <th>Service</th>
                     <th>Receipient</th>
                     <th>Ship Date</th>
                     <th>PDF</th>
                  </tr>
               </thead>
               <tbody>

               @foreach($responseArr as $order)
               <tr id="sid{{$order['orderId']}}">
                 <td><input type="checkbox"  name="ids" class="checkBoxClass" value="{{ $order['orderId'] }}"></td> 
                     <td>{{ $order['orderNumber'] }}</td>
                     <td>{{ $order['carrierCode'] }}</td>
                     <td>{{ $order['billTo']['name'] }}</td>
                     <td>{{ $order['shipByDate'] }}</td>
                     <td>
                        <button class="ui green compact labeled icon button" style="margin-left:10px;" id="new-order-button">
                           <i class="file pdf icon"></i>
                              Order Form
                           </button>
                     </td>
                  </tr>
                  @endforeach

               </tbody>
               <tfoot>
                  <tr>
                    <th></th>
                     <th>Order ID</th>
                     <th>Service</th>
                     <th>Receipient</th>
                     <th>Ship Date</th>
                     <th>PDF</th>
                  </tr>
               </tfoot>
            </table>
            
            <hr>
          
            <p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>
            <p><button>Submit</button></p>
            
            <p><b>Selected rows data:</b></p>
            <pre id="example-console-rows"></pre>
            
            <p><b>Form data as submitted to the server:</b></p>
            <pre id="example-console-form"></pre>
            

            </form>

      </div>
      <script>
         $(document).ready(function() {
            var table = $('#example').DataTable({     
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                        'selectRow': true
                        }
                    }
                ],
                'select': {
                    'style': 'multi'
                },
                'order': [[1, 'asc']]
            });
            
            // Handle form submission event 
            $('#frm-example').on('submit', function(e){
                var form = this;
                
                var rows_selected = table.column(0).checkboxes.selected();

                // Iterate over all selected checkboxes
                $.each(rows_selected, function(index, rowId){
                    // Create a hidden element 
                    $(form).append(
                        $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', 'id[]')
                            .val(rowId)
                    );
                });

                // FOR DEMONSTRATION ONLY
                // The code below is not needed in production
                
                // Output form data to a console     
                $('#example-console-rows').text(rows_selected.join(","));
                
                // Output form data to a console     
                $('#example-console-form').text($(form).serialize());
                
                // Remove added elements
                $('input[name="id\[\]"]', form).remove();
                
                // Prevent actual form submission
                e.preventDefault();
            });   
            });

      </script>
      <script>
        $(function (e) {
          $("#chkCheckAll").click(function() {
            $(".checkBoxClass").prop('checked',$(this).prop('checked'));
          });
          $('#deleteAllSelectedRecords').click(function(e){
            e.preventDefault();
            var allids = [];
            $("input:checkbox[name=ids]:checked").each(function(){
              allids.push($(this).val());
            });
            $.ajax({
              url:"{{route('orders.deleteSelected')}}",
              type:'DELETE',
              data:{
                ids:allids,
                _token:$("input[name=_token]").val()
              },
              success:function(response){
                $.each(allids,function(key,val){
                  $('#sid'+val).remove();
                });
              }
            });
          });
        });
      </script>
  </div>
</div>
    </body>
@endsection
</html>
