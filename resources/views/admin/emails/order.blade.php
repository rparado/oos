Hello {{ $order_stat->name }}, <br />
<br />
<br />
Please see table below for status of your order:
<br />
<br />
<table border="1" cellpadding="2" cellspacing="0" height="100%" width="100%">
	<tbody>
		<tr>
			<th align="left" valign="top">Order Number</th>
			<td align="left" valign="top">{{$order_stat->order_code}}</td>
		</tr>
		<tr>
			<th align="left" valign="top">Customer Name</th>
			<td align="left" valign="top">{{$order_stat->name}}</td>
		</tr>
		<tr>
			<th align="left" valign="top">Product Name</th>
			<td align="left" valign="top">{{$order_stat->product_name}}</td>
		</tr>
		<tr>
			<th align="left" valign="top">Amount</th>
			<td align="left" valign="top">{{$order_stat->amount}}</td>
		</tr>
		<tr>
			<th align="left" valign="top">Status</th>
			<td align="left" valign="top">{{$order_stat->status}}</td>
		</tr>
	</tbody>	
</table>
<br />
<br />
regards,<br />
<br />
Online Odering System Team