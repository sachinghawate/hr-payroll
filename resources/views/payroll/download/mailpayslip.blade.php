<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="box">
                <div>
                    <table class="w-100 table border">
                        <tr height="100px">
                            <td colspan="6"><h3 class="font-weight-bold">Hartley Labs Pvt. Ltd.</h3></td>
                            <td colspan="2">
                                <img height="40px" class="text-right" src='https://www.hartleylab.com/wp-content/themes/hartley/assets/images/logo.png' />
                            </td>
                        </tr>
                        <tr height="100px">
                            <td colspan="8">
                                <h6 class="text-center font-weight-bold mb-0">PAY SLIP - {{ $payroll->month ?? '-' }} {{ $payroll->year ?? '-' }}</h6>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>



