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
      <h1 class="text-3xl font-bold">Casas</h1>
      <a href="{{ url('adicionar') }}" class="px-3 py-2 bg-purple-400 rounded-md shadow-md hover:brightness-95 active:ring-2 active:ring-purple-500">Adicionar</a>
    </header>
    <main class="flex-grow mt-5 space-y-5">
      <section>
        <form action="{{ url('/') }}" method="post">
          @csrf
          <input type="search" name="search" id="search" placeholder="Pesquisar..." class="w-full p-2 bg-purple-200 rounded-md shadow-md outline-none focus:ring-2 focus:ring-purple-400">
        </form>
      </section>
      <section>
        @if ($casas)
          <table class="w-full shadow-md">
            <tr class="bg-purple-400">
              <th class="p-2 border border-purple-500">Imobiliária</th>
              <th class="p-2 border border-purple-500">Endereço</th>
              <th class="p-2 border border-purple-500">Preço</th>
              <th class="p-2 border border-purple-500">Situação</th>
              <th class="p-2 border border-purple-500">Opções</th>
            </tr>
            @foreach ($casas as $casa)
              <tr>
                <td class="p-2 border border-purple-500">{{ $casa->imobiliaria }}</td>
                <td class="p-2 border border-purple-500">{{ $casa->endereco }}</td>
                <td class="p-2 border border-purple-500">
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
                  <a href='{{ url("editar/$casa[id]") }}' title="Editar" class="inline-block p-1 bg-purple-200 outline outline-1 outline-purple-400 rounded-sm shadow-md hover:brightness-95 active:outline-2">✏️</a>
                  <a href='{{ url("deleter/$casa[id]") }}' title="Deletar" class="inline-block p-1 bg-purple-200 outline outline-1 outline-purple-400 rounded-sm shadow-md hover:brightness-95 active:outline-2">🗑️</a>
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <p>Sem casas para mostrar.</p>
        @endif
      </section>
    </main>
  </div>
</body>

</html>
