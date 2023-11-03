<!DOCTYPE html>
<html>
<head>
    <title>E-learning</title>
</head>
<body>
    @if (!empty($details['title']))
        <h1>{{ $details['title'] }}</h1>
    @endif

    @if (!empty($details['opener']))
        <p>{{ $details['opener'] }}</p>
    @endif

    @if (!empty($details['opener_desc']))
        <p>{{ $details['opener_desc'] }}</p>
    @endif

    @if (!empty($details['personal_data']))
        <p>{!! $details['personal_data'] !!}</p>
    @endif

    @if (!empty($details['closing']))    
        <p>{{ $details['closing'] }}</p>
    @endif
   
    <p>Best regards,</p>
    <br>
    <p>e-learning</p>
</body>
</html>