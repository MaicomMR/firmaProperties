@switch($EmployeeEstate->subcategory->name)
    @case('Outro')
    <i class="fas fa-question-circle"></i>
    @break

    @case('Monitor')
    <i class="fas fa-tv"></i>
    @break

    @case('Notebook')
    <i class="fas fa-laptop"></i>
    @break

    @case('Mouse')
    <i class="fas fa-mouse"></i>
    @break

    @case('Cadeira')
    <i class="fas fa-chair"></i>
    @break

    @case('Teclado')
    <i class="fas fa-keyboard"></i>
    @break

    @case('Headset')
    <i class="fas fa-headset"></i>
    @break

    @case('Fonte de Energia')
    <i class="fa fa-plug" aria-hidden="true"></i>
    @break

    @case('Celular')
    <i class="fa fa-plug" aria-hidden="true"></i>
    @break

    @default
    {{-- generic icon --}}
    <i class="fas fa-question-circle"></i>
    @break

@endswitch
