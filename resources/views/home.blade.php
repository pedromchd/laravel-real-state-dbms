<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Casas</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-purple-500 flex justify-center">
  <div class="min-w-[50rem] my-5 p-10 bg-purple-300 rounded-lg shadow-lg">
    <header class="flex items-center justify-between">
      <a href={{ url('/') }} title="Página inicial"><h1 class="text-3xl font-bold">Casas</h1></a>
      <a href={{ url('adicionar') }} class="px-3 py-2 bg-purple-400 rounded-md shadow-md hover:brightness-95 active:ring-2 active:ring-purple-500">Adicionar</a>
    </header>
    <main class="flex-grow mt-5 space-y-5">
      <section>
        <form action={{ url('filtrar') }} method="get">
          <input type="search" name="q" id="q" value="{{ isset($query) ? $query : '' }}" placeholder="Pesquisar casas por imobiliária e endereço..." class="w-full p-2 bg-purple-200 rounded-md shadow-md outline-none focus:ring-2 focus:ring-purple-400">
        </form>
      </section>
      <section>
        <table class="w-full shadow-md">
          <tr class="bg-purple-400">
            <th class="p-2 border border-purple-500 relative min-w-[125px]">
              <a href={{ route('filtrar', ['q' => $query ?: '', 'order_by' => $orderBy !== 'imobiliaria' ? 'imobiliaria' : 'id', 'status' => $status]) }} title="Ordenar casas por imobiliária" class="text-purple-950 underline">Imobiliária</a>
              @if ($orderBy === 'imobiliaria')
                <a href={{ route('filtrar', ['q' => $query ?: '', 'order_by' => 'imobiliaria', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc', 'status' => $status]) }} title="Inverter ordem da coluna" class="absolute right-2 hover:brightness-90">
                  {{ $orderDirection === 'asc' ? '⬆️' : '⬇️' }}
                </a>
              @endif
            </th>
            <th class="p-2 border border-purple-500 relative min-w-[125px]">
              <a href={{ route('filtrar', ['q' => $query ?: '', 'order_by' => $orderBy !== 'endereco' ? 'endereco' : 'id', 'status' => $status]) }} title="Ordenar casas por endereço" class="text-purple-950 underline">Endereço</a>
              @if ($orderBy === 'endereco')
                <a href={{ route('filtrar', ['q' => $query ?: '', 'order_by' => 'endereco', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc', 'status' => $status]) }} title="Inverter ordem da coluna" class="absolute right-2 hover:brightness-90">
                  {{ $orderDirection === 'asc' ? '⬆️' : '⬇️' }}
                </a>
              @endif
            </th>
            <th class="p-2 border border-purple-500">Preço</th>
            <th class="p-2 border border-purple-500">
              <a href={{ route('filtrar', ['q' => $query ?: '', 'order_by' => $orderBy, 'order_direction' => $orderDirection, 'status' => $status === '' ? 0 : ($status + 1)%4 ]) }} title="Ordenar casas por endereço" class="text-purple-950 underline">Situação</a>
            </th>
            <th class="p-2 border border-purple-500">Opções</th>
          </tr>
          @forelse ($casas as $casa)
            <tr>
              <td class="p-2 border border-purple-500">{{ $casa->imobiliaria }}</td>
              <td class="p-2 border border-purple-500">{{ $casa->endereco }}</td>
              <td class="p-2 border border-purple-500 {{ $casa->id === $maisCara ? 'text-yellow-600 font-bold' : '' }}">
                R$ {{ number_format($casa->preco, 2, ',', '.') }}
              </td>
              <td class="p-2 border border-purple-500">
                @if ($casa->situacao == 1)
                  À venda
                @elseif ($casa->situacao == 2)
                  Para alugar
                @else
                  Indisponível
                @endif
              </td>
              <td class="border border-purple-500 text-center">
                <a href={{ url("editar/$casa->id") }} title="Editar" class="inline-block p-1 bg-purple-200 outline outline-1 outline-purple-400 rounded-sm shadow-md hover:brightness-95 active:outline-2">✏️</a>
                <a href={{ url("deletar/$casa->id") }} title="Deletar" onclick="return confirm('Deletar casa?')" class="inline-block p-1 bg-purple-200 outline outline-1 outline-purple-400 rounded-sm shadow-md hover:brightness-95 active:outline-2">🗑️</a>
              </td>
            </tr>
          @empty
            <tr>
              <td class="p-2 border border-purple-500 text-center" colspan="5">Sem casas para mostrar.</td>
            </tr>
          @endforelse
        </table>
      </section>
    </main>
  </div>
</body>

</html>
