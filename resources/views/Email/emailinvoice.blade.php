<div style="max-width: 800px;margin: auto;padding: 15px;border: 1px solid #eee;box-shadow: 0 0 10px rgba(0, 0, 0, .15);font-size: 16px;line-height: 24px;font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color: #555;">
    <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
        <tr>
            <td colspan="5" style="padding: 5px;vertical-align: top;">
                <table style="width: 100%;line-height: inherit;text-align: left;">
                    <tr>
                        <td style="padding: 5px;vertical-align: top;padding-bottom: 20px;font-size: 45px;line-height: 45px;color: #333;"><img src='{{$logo}}' style="width:100%; max-width:100px;"></td>
                        <td style="padding: 5px;vertical-align: top;text-align: right;padding-bottom: 20px;">{{ trans('labels.invoice') }} #{{$orderdata->order_number}}</td>   
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="padding: 5px;vertical-align: top;">
                <table style="width: 100%;line-height: inherit;text-align: left;">
                    <tr>
                        <td style="padding-bottom: 0px;vertical-align: top;font-family:'Poppins',Helvetica,Arial,sans-serif;color:#19c0c2;font-weight:700;">
                            {{trans('labels.dear')}} {{$orderdata->user_info->name}},
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;text-align: left;padding-bottom: 30px;">
                            <p style="margin-top:2px;margin-bottom:2px; font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">Thank you for order with us.</p>
                            <p style="margin-top:2px;margin-bottom:2px; font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">Your Order has been placed with Order number : <span style="font-size: 12px; font-weight: 800; line-height: 24px; color: #777777;">{{$orderdata->order_number}}</span> and it will be processed as soon as possible by the Admin. You can use this Order number to track Order status</p>
                            <p style="margin-top:2px;margin-bottom:2px; font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">You will get an Order confirmation email from admin soon .
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="padding: 5px;vertical-align: top;">
                <table style="width: 100%;line-height: inherit;text-align: left;">
                    <tr>
                        <td style="padding: 5px;vertical-align: top;padding-bottom: 20px;">
                            {{-- {{$orderdata->user_info->name}}<br> --}}
                            {{$orderdata->user_info->email}}<br>
                            {{$orderdata->user_info->mobile}}<br>
                            {{$orderdata->address}}
                        </td>
                        <td style="padding: 5px;vertical-align: top;text-align: right;padding-bottom: 40px;">
                            @if ($orderdata['order_notes'] !="")
                                <strong>{{ trans('labels.order_note') }}</strong><br>
                                {{$orderdata['order_notes']}}
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">#</td>
            <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">{{ trans('labels.items') }}</td>
            <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">{{ trans('labels.qty') }}</td>
            <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">{{ trans('labels.unit_cost') }}</td>
            <td style="padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">{{trans('labels.subtotal')}}</td>
        </tr>
        <?php
            $i=1;
            foreach ($itemdata as $orderitem){

            $orderitem['addons_price']=="" ? $addonsprice = 0 : $addonsprice = array_sum(explode(',',$orderitem['addons_price'])); 
            $total_price = ($orderitem['item_price']+$addonsprice)*$orderitem['qty'];
            $data[] = array("total_price" => $total_price,);
        ?>
            <tr>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">{{$i}}</td>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    @if($orderitem['item_type'] == 1) 
                        <img src="{{Helper::image_path('veg.svg')}}" alt="">
                    @else 
                        <img src="{{Helper::image_path('nonveg.svg')}}" alt="">
                    @endif
                    {{$orderitem['item_name']}}
                    @if($orderitem->variation != "")
                        [{{$orderitem->variation}}]
                    @endif<br>
                    <?php
                        $addons_name = explode(',', $orderitem->addons_name);
                        $addons_price = explode(',', $orderitem->addons_price);
                        $addonstotal = 0;
                    ?>
                    @if($orderitem->addons_id != "")
                        @foreach($addons_name as $key => $val)
                        <small class="text-muted">{{$addons_name[$key]}} : <span>{{Helper::currency_format($addons_price[$key])}}</span></small><br>
                        <?php $addonstotal += (float)$addons_price[$key]?>
                        @endforeach
                    @endif
                </td>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">{{$orderitem['qty']}}</td>          
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">{{Helper::currency_format($orderitem['item_price'])}}
                    @if($addonstotal != "0")
                        <br><small class="text-muted">+ {{Helper::currency_format($addonstotal)}}</small>
                    @endif
                </td>
                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">{{Helper::currency_format($total_price)}}</td>
            </tr>
        <?php
                $i++;
            }
            $order_total = array_sum(array_column(@$data, 'total_price'));
        ?>
        <tr>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;text-align: right;border-top: 2px solid #eee;font-weight: bold;">
               <strong>{{trans('labels.order_total')}} : </strong> {{Helper::currency_format($order_total)}}
            </td>
        </tr>
        @if ($orderdata->tax_amount > 0)
        <tr>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;text-align: right;border-top: 2px solid #eee;font-weight: bold;">
               <strong>{{trans('labels.tax')}} : </strong> {{Helper::currency_format($orderdata->tax_amount)}}
            </td>
        </tr>
        @endif
        @if ($orderdata->delivery_charge > 0)
        <tr>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;text-align: right;border-top: 2px solid #eee;font-weight: bold;">
               <strong>{{trans('labels.delivery_charge')}} : </strong> {{Helper::currency_format($orderdata->delivery_charge)}}
            </td>
        </tr>
        @endif
        @if ($orderdata->discount_amount > 0)
        <tr>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;text-align: right;border-top: 2px solid #eee;font-weight: bold;">
               <strong>{{trans('labels.discount')}} ({{$orderdata->offer_code}}) : </strong> {{Helper::currency_format($orderdata->discount_amount)}}
            </td>
        </tr>
        @endif
        <tr>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;"></td>
            <td style="padding: 5px;vertical-align: top;text-align: right;border-top: 2px solid #eee;font-weight: bold;">
               <strong>{{trans('labels.grand_total')}} : </strong> {{Helper::currency_format($orderdata->grand_total)}}
            </td>
        </tr>
    </table>
</div>