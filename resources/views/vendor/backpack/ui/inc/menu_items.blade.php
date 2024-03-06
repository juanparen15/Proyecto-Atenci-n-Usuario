{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Areas" icon="la la-question" :link="backpack_url('area')" />
<x-backpack::menu-item title="Carteras" icon="la la-question" :link="backpack_url('cartera')" />
<x-backpack::menu-item title="Empresas" icon="la la-question" :link="backpack_url('empresa')" />
<x-backpack::menu-item title="Plan desarrollos" icon="la la-question" :link="backpack_url('plan-desarrollo')" />
<x-backpack::menu-item title="Productos" icon="la la-question" :link="backpack_url('producto')" />
<x-backpack::menu-item title="Programas" icon="la la-question" :link="backpack_url('programa')" />
<x-backpack::menu-item title="Sectors" icon="la la-question" :link="backpack_url('sector')" />
<x-backpack::menu-item title="Sub programas" icon="la la-question" :link="backpack_url('sub-programa')" />
<x-backpack::menu-item title="Tipo productos" icon="la la-question" :link="backpack_url('tipo-producto')" />
<x-backpack::menu-item title="Unidad medidas" icon="la la-question" :link="backpack_url('unidad-medida')" />
<x-backpack::menu-item title='Backups' icon='la la-hdd-o' :link="backpack_url('backup')" />
<x-backpack::menu-item title='Logs' icon='la la-terminal' :link="backpack_url('log')" />
<x-backpack::menu-item title='Settings' icon='la la-cog' :link="backpack_url('setting')" />