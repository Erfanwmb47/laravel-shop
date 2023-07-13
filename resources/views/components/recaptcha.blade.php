<div>
    <script src='https://www.google.com/recaptcha/api.js?hl=fa' async defer></script>
    <div class='g-recaptcha float-start mb-2 @error('g-recaptcha-response')border border-danger border-2 @enderror'  data-theme='light' data-sitekey='{{$clientkey}}'></div>
</div>
@error('g-recaptcha-response')
<a class="text-danger text-xs mt-1">{{$message}}</a>
@enderror
