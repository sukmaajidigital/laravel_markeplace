<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">{{ $title ?? __('You will receive money through the information below') }}</h4>
    <p>{{ __('Bank Name') }}: <strong>{{ Arr::get($bankInfo, 'name') }}</strong></p>
    <p>{{ __('Bank Code/IFSC') }}: <strong>{{ Arr::get($bankInfo, 'code') }}</strong></p>
    <p>{{ __('Account Holder Name') }}: <strong>{{ Arr::get($bankInfo, 'full_name') }}</strong></p>
    <p>{{ __('Account Number') }}: <strong>{{ Arr::get($bankInfo, 'number') }}</strong></p>
    <p>{{ __('PayPal ID') }}: <strong>{{ Arr::get($bankInfo, 'paypal_id') }}</strong></p>
    <p>{{ __('UPI ID') }}: <strong>{{ Arr::get($bankInfo, 'upi_id') }}</strong></p>
    <p>{{ __('Description') }}: {{ Arr::get($bankInfo, 'description') }}</p>
    @isset($link)
        <hr>
        <p class="mb-0">{!! clean(__('You can update in <a href=":link">here</a>', ['link' => $link])) !!}</p>
    @endisset
</div>
