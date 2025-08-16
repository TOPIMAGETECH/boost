<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-file-excel-o"></i> Sales Management</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Sales Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-excel">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-table"></i> Sales Records</h3>
        <div class="box-tools pull-right">
          <a href="create-sales" class="btn btn-excel">
            <i class="fa fa-plus"></i> New Sale
          </a>
          <button class="btn btn-excel" id="exportExcel">
            <i class="fa fa-download"></i> Export
          </button>
        </div>
      </div>

      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-excel table-bordered table-hover table-striped">
            <thead class="excel-header">
              <tr>
                <th class="excel-col-header">#</th>
                <th class="excel-col-header">Bill #</th>
                <th class="excel-col-header">Customer</th>
                <th class="excel-col-header">Seller</th>
                <th class="excel-col-header">Payment</th>
                <th class="excel-col-header excel-number">Net Cost</th>
                <th class="excel-col-header excel-number">Total Cost</th>
                <th class="excel-col-header">Date</th>
                <th class="excel-col-header">Actions</th>
              </tr>
            </thead>
            
            <tbody>
              <?php
              $item = null;
              $valor = null;
              $respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);
              
              if(!empty($respuesta)) {
                foreach ($respuesta as $key => $value) {
                  $rowClass = ($key % 2 == 0) ? 'excel-even-row' : 'excel-odd-row';
                  echo '<tr class="' . $rowClass . '">';
                  echo '<td class="excel-cell">' . ($key + 1) . '</td>';
                  echo '<td class="excel-cell">' . htmlspecialchars($value["codigo"]) . '</td>';

                  // Customer information
                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];
                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
                  echo '<td class="excel-cell">' . htmlspecialchars($respuestaCliente["nombre"] ?? 'N/A') . '</td>';

                  // Seller information
                  $itemUsuario = "id";
                  $valorUsuario = $value["id_vendedor"];
                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
                  echo '<td class="excel-cell">' . htmlspecialchars($respuestaUsuario["nombre"] ?? 'N/A') . '</td>';

                  // Payment and amounts
                  echo '<td class="excel-cell">' . htmlspecialchars($value["metodo_pago"] ?? 'Unknown') . '</td>';
                  echo '<td class="excel-cell excel-number">$ ' . number_format($value["neto"] ?? 0, 2) . '</td>';
                  echo '<td class="excel-cell excel-number">$ ' . number_format($value["total"] ?? 0, 2) . '</td>';
                  echo '<td class="excel-cell">' . htmlspecialchars($value["fecha"] ?? '') . '</td>';

                  // Actions
                  echo '<td class="excel-cell excel-actions">
                        <div class="btn-group btn-group-xs">
                          <button class="btn btn-excel-light btnPrintSale" data-id="' . $value["id"] . '" title="Print">
                            <i class="fa fa-print"></i>
                          </button>
                          <button class="btn btn-excel-light btnEditSale" data-id="' . $value["id"] . '" title="Edit">
                            <i class="fa fa-pencil"></i>
                          </button>
                          <button class="btn btn-excel-light btnDeleteSale" data-id="' . $value["id"] . '" title="Delete">
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>  
                      </td>';
                  echo '</tr>';
                }
              } else {
                echo '<tr><td colspan="9" class="excel-cell text-center">No sales records found</td></tr>';
              }
              ?>
            </tbody>
            
            <?php if(!empty($respuesta)): ?>
            <tfoot class="excel-footer">
              <tr>
                <td colspan="5" class="excel-cell text-right"><strong>Totals:</strong></td>
                <td class="excel-cell excel-number"><strong>$ <?php 
                  $totalNeto = array_sum(array_column($respuesta, 'neto'));
                  echo number_format($totalNeto, 2);
                ?></strong></td>
                <td class="excel-cell excel-number"><strong>$ <?php 
                  $totalTotal = array_sum(array_column($respuesta, 'total'));
                  echo number_format($totalTotal, 2);
                ?></strong></td>
                <td colspan="2" class="excel-cell"></td>
              </tr>
            </tfoot>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<style>
  /* Excel-like styling */
  .box-excel {
    border: 1px solid #e1e1e1;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
  }
  
  .table-excel {
    font-family: 'Segoe UI', Arial, sans-serif;
    font-size: 13px;
    border-collapse: separate;
    border-spacing: 0;
  }
  
  .excel-header {
    background: #4472C4;
    color: white;
  }
  
  .excel-col-header {
    padding: 8px 12px;
    border-right: 1px solid #ffffff;
    font-weight: bold;
    text-align: center;
  }
  
  .excel-cell {
    padding: 6px 10px;
    border: 1px solid #e1e1e1;
    vertical-align: middle;
  }
  
  .excel-number {
    text-align: right;
    font-family: 'Consolas', monospace;
  }
  
  .excel-even-row {
    background-color: #ffffff;
  }
  
  .excel-odd-row {
    background-color: #f9f9f9;
  }
  
  .excel-actions {
    white-space: nowrap;
    text-align: center;
  }
  
  .btn-excel {
    background-color: #4472C4;
    color: white;
    border-color: #3a62a8;
  }
  
  .btn-excel:hover {
    background-color: #3a62a8;
    color: white;
  }
  
  .btn-excel-light {
    background-color: #e9eef7;
    color: #4472C4;
    border-color: #d0d7e7;
  }
  
  .btn-excel-light:hover {
    background-color: #d0d7e7;
    color: #3a62a8;
  }
  
  .excel-footer {
    background-color: #e9eef7;
    font-weight: bold;
  }
</style>

<script>
$(document).ready(function() {
  // Export to Excel functionality
  $('#exportExcel').click(function() {
    // Implement your export to Excel logic here
    alert('Export to Excel functionality would be implemented here');
  });
});
</script>