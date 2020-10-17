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

        <form action="/order"  method="POST">
            @csrf

        <button class="ui red compact labeled icon button" style="margin-bottom:20px;" id="new-order-button">
        <i class="minus circle icon"></i>
          Delete Orders
        </button>
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
                     <th></th>
                     <th>Order ID</th>
                     <th>Service</th>
                     <th>Receipient</th>
                     <th>Ship Date</th>
                     <th>PDF</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                  <td>1</td>
                     <td>{{ $response['orderNumber'] }}</td>
                     <td>{{ $response['carrierCode'] }}</td>
                     <td>{{ $response['customerUsername'] }}</td>
                     <td>{{ $response['shipByDate'] }}</td>
                     <td>
                        <button class="ui green compact labeled icon button" style="margin-left:10px;" id="new-order-button">
                           <i class="file pdf icon"></i>
                              Order Form
                           </button>
                     </td>
                  </tr>                
                  <tr>
                  <td>2</td>
                     <td>2038523490809</td>
                     <td>USPS First Class Shipping</td>
                     <td>Richard James</td>
                     <td>2012/03/29</td>
                     <td>
                        <button class="ui green compact labeled icon button" style="margin-left:10px;" id="new-order-button">
                           <i class="file pdf icon"></i>
                              Order Form
                        </button>
                     </td>
                  </tr>
                  <tr>
                  <td>3</td>
                     <td>1092134801</td>
                     <td>USPS First Class Shipping</td>
                     <td>Jose Rodrigues</td>
                     <td>2011/04/25</td>
                     <td>
                        <button class="ui green compact labeled icon button" style="margin-left:10px;" id="new-order-button">
                           <i class="file pdf icon"></i>
                              Order Form
                           </button>
                     </td>
                  </tr>                
                  <tr>
                  <td>4</td>
                     <td>2038523490809</td>
                     <td>USPS First Class Shipping</td>
                     <td>Michael Schumeaher</td>
                     <td>2012/03/29</td>
                     <td>
                        <button class="ui green compact labeled icon button" style="margin-left:10px;" id="new-order-button">
                           <i class="file pdf icon"></i>
                              Order Form
                        </button>
                     </td>
                  </tr>
                  <tr>  
                  <td>5</td>
                     <td>1092134801</td>
                     <td>USPS First Class Shipping</td>
                     <td>Naomi Watson</td>
                     <td>2011/04/25</td>
                     <td>
                        <button class="ui green compact labeled icon button" style="margin-left:10px;" id="new-order-button">
                           <i class="file pdf icon"></i>
                              Order Form
                           </button>
                     </td>
                  </tr>                
                  <tr>
                    <td>6</td>
                     <td>2038523490809</td>
                     <td>USPS First Class Shipping</td>
                     <td>Albert Einstein</td>
                     <td>2012/03/29</td>
                     <td>
                        <button class="ui green compact labeled icon button" style="margin-left:10px;" id="new-order-button">
                           <i class="file pdf icon"></i>
                              Order Form
                        </button>
                     </td>
                  </tr>
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
  </div>
</div>
    </body>
@endsection
</html>
