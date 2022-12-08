<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style type="text/css">
        * {font-family: "DejaVu Sans";font-size: 12px;line-height: 12px;}
        table {margin: 0 0 15px 0;width: 100%;border-collapse: collapse;border-spacing: 0;}
        table th {padding: 5px;font-weight: bold;}
        table td {padding: 5px;}
        .header {margin: 0 0 0 0;padding: 0 0 15px 0;font-size: 12px;line-height: 12px;text-align: center;}
        h1 {margin: 0 0 10px 0;padding: 10px 0;border-bottom: 2px solid #000;font-weight: bold;font-size: 18px;}

        /* Реквизиты банка */
        .details td {padding: 3px 2px;border: 1px solid #000000;font-size: 12px;line-height: 12px;vertical-align: top;}

        /* Поставщик/Покупатель */
        .contract th {padding: 3px 0;vertical-align: top;text-align: left;font-size: 13px;line-height: 15px;}
        .contract td {padding: 3px 0;}

        /* Наименование товара, работ, услуг */
        .list thead, .list tbody  {border: 2px solid #000;}
        .list thead th {padding: 4px 0;border: 1px solid #000;vertical-align: middle;text-align: center;}
        .list tbody td {padding: 0 2px;border: 1px solid #000;vertical-align: middle;font-size: 11px;line-height: 13px;}
        .list tfoot th {padding: 3px 2px;border: none;text-align: right;}

        /* Сумма */
        .total {margin: 0 0 20px 0;padding: 0 0 10px 0;border-bottom: 2px solid #000;}
        .total p {margin: 0;padding: 0;}

        /* Руководитель, бухгалтер */
        .sign {position: relative;}
        .sign table {width: 60%;}
        .sign th {padding: 40px 0 0 0; text-align: left;}
        .sign td {padding: 40px 0 0 0; border-bottom: 1px solid #000; text-align: right; font-size: 12px;}
        .sign-u {position: relative; height: 24px;}
        .printing {position: relative; left: 271px; height: 158px; width: 158px;}
    </style>
</head>
<body>
<p class="header">
    Внимание! Оплата данного счета означает согласие с условиями поставки товара.
    Уведомление об оплате обязательно, в противном случае не гарантируется наличие
    товара на складе. Товар отпускается по факту прихода денег на р/с Поставщика,
    самовывозом, при наличии доверенности и паспорта.
</p>

<table class="details">
    <tbody>
    <tr>
        <td colspan="2" style="border-bottom: none;">ФИЛИАЛ "ЦЕНТРАЛЬНЫЙ" БАНКА ВТБ
            (ПАО) г. Москва</td>
        <td>БИК</td>
        <td style="border-bottom: none;">044525411</td>
    </tr>
    <tr>
        <td colspan="2" style="border-top: none; font-size: 10px;">Банк получателя</td>
        <td>Сч. №</td>
        <td style="border-top: none;">30101810145250000411</td>
    </tr>
    <tr>
        <td width="25%">ИНН 2801269818</td>
        <td width="30%">КПП 280101001</td>
        <td width="10%" rowspan="3">Сч. №</td>
        <td width="35%" rowspan="3">40702810508490006730</td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: none;">ООО "НИЛ"</td>
    </tr>
    <tr>
        <td colspan="2" style="border-top: none; font-size: 10px;">Получатель</td>
    </tr>
    </tbody>
</table>

<h1>Счет на оплату № {{ $params->prefix }}{{ $params->separator }}{{ $order->id }} от {{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }} г.</h1>

<table class="contract">
    <tbody>
    <tr>
        <td width="15%">Поставщик:</td>
        <th width="85%">ООО "НИЛ", ИНН 2801269818, КПП 280101001, 675002, Амурская Область, Благовещенск г, ул Горького, дом № 9</th>
    </tr>
    <tr>
        <td>Покупатель:</td>
        <th>{{ $user->name }}, {{ $user->address }}</th>
    </tr>
    </tbody>
</table>

<table class="list">
    <thead>
    <tr>
        <th width="5%">№</th>
        <th width="53%">Наименование товара</th>
        <th width="9%">Кол-во</th>
        <th width="4%">Ед.</th>
        <th width="14%">Цена</th>
        <th width="14%">Сумма</th>
    </tr>
    </thead>
    <tbody>

    @php

        $total = 0;

        function format_price($value)
        {
            return number_format($value, 2, ',', ' ');
        }

        // Сумма прописью.
        function str_price($value)
        {
	        $value = explode('.', number_format($value, 2, '.', ''));

	        $f = new NumberFormatter('ru', NumberFormatter::SPELLOUT);
	        $str = $f->format($value[0]);

	        $str = mb_strtoupper(mb_substr($str, 0, 1)) . mb_substr($str, 1, mb_strlen($str));

	        $num = $value[0] % 100;
	        if ($num > 19) {
		        $num = $num % 10;
	        }
	        switch ($num) {
		        case 1: $rub = 'рубль'; break;
		        case 2:
		        case 3:
		        case 4: $rub = 'рубля'; break;
		        default: $rub = 'рублей';
	        }

	        return $str . ' ' . $rub . ' ' . $value[1] . ' копеек.';
        }

    @endphp

    @foreach($order->products ?? '' as $key => $data)
    @php
        $total += $data->product->prices[0]->price * $data->quantity;
    @endphp
    <tr>
        <td align="center">{{ $key + 1 }}</td>
        <td align="left">{{ $data->product->name }}</td>
        <td align="right">{{ $data->quantity }}</td>
        <td align="left">{{ $data->product->unit->short }}</td>
        <td align="right">{{ format_price($data->product->prices[0]->price) }}</td>
        <td align="right">{{ format_price($data->product->prices[0]->price * $data->quantity) }}</td>
    </tr>
    @endforeach

    </tbody>
    <tfoot>
    <tr>
        <th colspan="5">Итого:</th>
        <th>{{ format_price($total) }}</th>
    </tr>
    @php
        $totalNds = $data->product->prices[0]->nds * $data->quantity;
    @endphp
    <tr>
        <th colspan="5">В том числе НДС:</th>
        <th>{{ ((empty($totalNds)) ? '-' : format_price($totalNds)) }}</th>
    </tr>
    <tr>
        <th colspan="5">Всего к оплате:</th>
        <th>{{ format_price($total) }}</th>
    </tr>
    </tfoot>
</table>

<div class="total">
    <p>Всего наименований {{count($order->products)}}, на сумму {{ format_price($total) }} руб.</p>
    <p><strong>{{ str_price($total) }}</strong></p>
</div>

<div class="sign">

    <table>
        <tbody>
        <tr>
            <th width="30%">Руководитель</th>
            <td width="70%">
                <img class="sign-u" src="{{ public_path('/storage/documents/order/sign.jpg') }}">
                Соловьёв Н.И.
            </td>
        </tr>
        <tr>
            <th>Бухгалтер</th>
            <td>
                <img class="sign-u" src="{{ public_path('/storage/documents/order/sign.jpg') }}">
                Соловьёв Н.И.
            </td>
        </tr>
        </tbody>
    </table>
    <img class="printing" src="{{ public_path('/storage/documents/order/print.jpg') }}">
</div>
</body>
</html>
