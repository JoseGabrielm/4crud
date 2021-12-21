<div x-data="{}" class = 'container'>
   <table class="table">
      <thead>
        <tr>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>

      @foreach($products as $index => $product)
          
        <tr>

          <td>
            @if($editedProductIndex === $index || $editedProductField === $index)
                <input type="text" 
                @click.away="$wire.editedProductField ==='{{ $index }}.name' ? $wire.saveProduct({{ $index }}) : null "  
                wire:model.defer="products.{{ $index }}.name"
                {{ $product['name'] }}
                />
                @if($errors->has('products.'. $index . '.name'))
                  <div>{{ $errors->first('products.' . $index . '.name') }}</div>
                @endif
            @else
                <div class=" " wire:click="editProductField({{ $index }}, 'name')">
                  {{ $product['name'] }}
                </div>
            @endif
          </td>
          <td>
            @if($editedProductIndex === $index || $editedProductField === $index)
                <input type="text" 
                @click.away="$wire.editedProductField ==='{{ $index }}.price' ? $wire.saveProduct({{ $index }}) : null "  
                wire:model.defer="products.{{ $index }}.price"
                {{ $product['price'] }}
                />
                @if($errors->has('products.'. $index . '.price'))
                  <div>{{ $errors->first('products.' . $index . '.price') }}</div>
                @endif
            @else
                <div class=" " wire:click="editProductField({{ $index }}, 'price')">
                  {{ $product['price'] }}
                </div>
            @endif
          </td>
          <td>
            @if ($editedProductIndex !== $index)
              <button type="button" class="btn btn-primary"
              wire:click.prevent="editProduct({{$index}})" >
                Edit
              </button>
            @else
              <button type="button" class="btn btn-primary"
              wire:click.prevent="saveProduct( {{ $index }} )" >
                Save
              </button>
            @endif
          </td>
        </tr>

      @endforeach  
      
      </tbody>
    </table>
</div>
