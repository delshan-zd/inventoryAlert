<script>


const TransactionData = {
// 1. Labels for the Title
titles: {
'{{ \App\Enums\TransactionType::IN->value }}': 'Restock (Stock In)',
'{{ \App\Enums\TransactionType::OUT->value }}': 'Reduce (Stock Out)'
},

// 2. Reasons grouped by Type
reasons: {
'{{ \App\Enums\TransactionType::IN->value }}': [
@foreach(\App\Enums\TransactionReason::forType('in') as $reason)
{ value: '{{ $reason->value }}', label: '{{ $reason->label() }}' },
@endforeach
],
'{{ \App\Enums\TransactionType::OUT->value }}': [
@foreach(\App\Enums\TransactionReason::forType('out') as $reason)
{ value: '{{ $reason->value }}', label: '{{ $reason->label() }}' },
@endforeach
]
}
};
</script>



























