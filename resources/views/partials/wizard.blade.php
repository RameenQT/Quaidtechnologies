<ul class="progress-indicator" style="padding-top: 15px;">
    {{--<li> <a href="{{ route('contracts.index') }}"><span class="bubble"></span> Contracts Management</a> </li>--}}
    <li id="step_ep"> <a href="{{ route('contracts.edit', $contract_id) }}"><span class="bubble"></span> Edit Contract</a> </li>
    <li id="step_pp"> <a href="{{ route('contracts.partners_profit', [$contract_id]) }}"><span class="bubble"></span> Partner(s) Profit</a> </li>
    <li id="step_bp"> <a href="{{ route('contracts.payments', [$contract_id, 'buyer']) }}"><span class="bubble"></span> Payments from Buyer</a> </li>
    <li id="step_sp"> <a href="{{ route('contracts.payments', [$contract_id, 'seller']) }}"><span class="bubble"></span> Payments to Seller(s)</a> </li>
    <li id="step_ip"> <a href="{{ route('contracts.payments', [$contract_id, 'investor']) }}"><span class="bubble"></span> Investor(s) Profits</a> </li>
    <li id="step_m"> <a href="{{ route('contracts.messages.index', [$contract_id]) }}"><span class="bubble"></span> Message(s)</a> </li>
    <li id="step_d"> <a href="{{ route('contracts.documents.index', [$contract_id]) }}"><span class="bubble"></span> Documents(s)</a> </li>
    <li id="step_s"> <a href="{{ route('contracts.summary', [$contract_id]) }}"><span class="bubble"></span> Summary</a> </li>
</ul>
