@extends('layout.app')

@section('title', 'Pizza Order')

@section('previous-page-url', url('/generate-password'))
@section('next-page-url', url('/filter-credits'))


@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Order Your Pizza</h1>
    <form action="{{ url('/pizza') }}" method="post">
        @csrf
        <div id="pizza-orders">
            <div class="pizza-order">
                <div class="form-group">
                    <label for="size">Select pizza size:</label>
                    <select class="form-control" name="size[]" id="size">
                        <option value="small">Small - RM15</option>
                        <option value="medium">Medium - RM22</option>
                        <option value="large">Large - RM30</option>
                    </select>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="toppings[0][]" id="pepperoni" value="pepperoni">
                    <label class="form-check-label" for="pepperoni">Pepperoni (+RM3)</label>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="toppings[0][]" id="extra_cheese" value="extra_cheese">
                    <label class="form-check-label" for="extra_cheese">Extra Cheese (+RM6)</label>
                </div>
                <button type="button" class="btn btn-danger remove-pizza">Remove</button>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="add-pizza">Add Another Pizza</button>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let pizzaIndex = 1;
        document.getElementById('add-pizza').addEventListener('click', function () {
            const pizzaOrders = document.getElementById('pizza-orders');
            const newPizzaOrder = pizzaOrders.firstElementChild.cloneNode(true);

            // Update the name attributes for the cloned pizza order
            newPizzaOrder.querySelector('select').name = 'size[]';
            newPizzaOrder.querySelectorAll('input[type="checkbox"]').forEach((checkbox, index) => {
                checkbox.name = `toppings[${pizzaIndex}][]`;
                checkbox.checked = false;
            });

            pizzaOrders.appendChild(newPizzaOrder);
            pizzaIndex++;
        });

        document.getElementById('pizza-orders').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-pizza')) {
                if (document.querySelectorAll('.pizza-order').length > 1) {
                    e.target.parentElement.remove();
                }
            }
        });
    });
</script>
@endsection
