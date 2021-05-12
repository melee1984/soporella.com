@component('mail::message')

# Your tickets is now available!

Please find the link below to download your tickets <br><br>

# Order # {{ $_cart->ref_no }}

Date: {{ $_cart->created_at->format('F d, Y h:i a') }}  <br>
Account: {{ $_cart->fullname }} <br>
E-mail: {{ $_cart->email }}<br>
Mobile: {{ $_cart->mobile }} <br>
Payment: {{ $_cart->payment->title }}
<br>
# Tickets

<p class="subcopy"></p>

<table width="100%" cellpadding="5" style="font-size: 14px !important;" class="cartDetail">
		@foreach($_cart->details as $detail)
			@foreach(unserialize($detail->variance_details) as $variance)
				<tr>
					<td width="70%">{{ $detail->attraction->title }} <br>
					<strong>{{ $variance['title'] }} - {{ date('F d, Y', strtotime($detail->selected_date) ) }}</strong>
					<br><br>
					<a href="">Download Ticket</a>
				</td>
					<td valign="top" width="15%">{{ $variance['qty'] }} </td>
					<td valign="top" width="15%">{{ number_format( $variance['price'], 2) }} </td>
				</tr>
			@endforeach
		@endforeach	
</table>

<p class="subcopy"></p>

<table width="100%" border="0" cellpadding="4" style="font-size: 14px !important;" class="cartDetail">
	<tr>
		<td colspan="2"></td>
		<td width="30%" align="right"><strong>Sub Total</strong></td>
		<td width="20%">{{ $_cart->summary()['subTotal'] }}</td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td width="30%" align="right"><strong>Discount</strong></td>
		<td width="20%">{{ $_cart->summary()['discount'] }}</td>
	</tr>
	<tr>
			<td colspan="2"></td>
		<td width="30%" align="right"><strong>Total (VAT included)</strong></td>
		<td width="20%">{{ $_cart->summary()['total'] }}</td>
	</tr>
</table>

<p class="subcopy"></p>

We hope you have an enjoyable experience and continue to use Soporella in the future.

@component('mail::button', ['url' => URL::to('myaccount/tickets') ])
View Tickets
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
