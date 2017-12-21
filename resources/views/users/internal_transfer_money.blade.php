@extends('layouts.user')

@section('script_f')
  <script type="text/javascript" src="{{ asset('js/transfer.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/new.css') }}">
@stop

@section('content')
    <p style="color: #15a4d3; font-weight: bold;">Chuyển tiền đến một tài khoản trong Ngân Hàng</p>


    <div class="panel panel-info">
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody id="transfer">
                        <tr>
                            <td>Tài khoản chuyển</td>
                            <td id="acc_id"><select name="account_id" class="form-control" id="account_id">
                            @foreach($accounts as $account)
                              <option value="{{ $account->bank_number }}">{{ $account->bank_number }} - {{ $account->user->userInfo->name}}</option>
                            @endforeach                             
                            </select>
                        </td>
                        </tr>
                      <tr>
                        <td>Số dư khả dụng</td>
                        <td id="acc_balance"><div id="balance">
                        
                        </div>
                      </tr>
                      <tr>
                        <td>Số tài khoản chuyển</td>
                        <td id="acc_bank_number"><input  name="bank_number" class="form-control" type="number" id="bank_number"></td>
                      </tr>
                      <tr>
                        <td>Tên người nhận</td>
                        <td id="acc_name_to"><div id="name_to">                            

                          </div>
                         </td>
                      </tr>

                      <tr>
                        <td>Số tiền (VND)</td>
                        <td id="acc_money"><input name="money" class="form-control" type="text" id="money" value="" onkeyup="format_num(id)"></td>
                      </tr>

                      <tr>
                        <td>Nội dung chuyển tiền</td>
                        <td id="acc_note"><textarea name="note" class="form-control" rows="5" id="note"></textarea></td>
                      </tr>
                     
                    </tbody>

                  </table>

                </div>
              </div>
            </div>

                 <div class="panel-footer">                     
                    <span class="" id="footer_id">
                        <button type="button" class="btn btn-warning" id="submit">Gửi</button>                
                        <button type="reset" class="btn btn-warning">Hủy</button>
                    </span>
                </div>
            
          </div>

<SCRIPT LANGUAGE="JavaScript">
<!--
function format_num(id) {
var number = document.getElementById(id).value;
        number += '';
        //number = number.replace(",","");
        number = number.replace(/,/g, '');
        x = number.split('.');
        x1 = x[0];
        x2 = (x.length > 1) ? '.' + x[0] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        document.getElementById(id).value = x1 + x2;
    }
//-->
</SCRIPT>
@stop