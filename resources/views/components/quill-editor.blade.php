<div>
    <div>
        <div id="{{ $attributes['id'] ?? 'editor-' . uniqid() }}" class="ql-editor-container">
            <!-- Div onde o Quill renderiza o conteúdo -->
            <div class="editor-content" data-content="{!! $attributes['value'] ?? null !!}"></div>
        </div>
    </div>
    <!-- Include the Quill library -->


    <!-- Initialize Quill editor -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editorContainer = document.querySelector('#{{ $attributes['id'] ?? 'editor-' . uniqid() }} .editor-content');
            const content = editorContainer.dataset.content;

            const quill = new Quill('#{{ $attributes['id'] ?? 'editor-' . uniqid() }}', {
                theme: 'snow',
            });

            // Set the initial content
            if (content) {
                quill.root.innerHTML = content;
            }

            // Sync with the hidden input
            quill.on('text-change', function () {
                const input = document.querySelector('input[name="{{ $attributes['name'] }}"]');
                let htmlContent = quill.root.innerHTML.trim();

                // Remove Quill's default empty content
                if (htmlContent === '<p><br></p>') {
                    htmlContent = ''; // Define como vazio
                }

                input.value = htmlContent;
            });
        });
    </script>

    <!-- Hidden input to sync data with form -->
    <input type="hidden" name="{{ $attributes['name'] }}" value="{{ $attributes['value'] ?? '' }}">
    <style>
        /* Fundo e texto da barra de ferramentas */
        .ql-toolbar {
            background-color: #1f2937; /* Fundo escuro */
            color: #ffffff; /* Texto branco */
        }

        /* Botões da toolbar */
        .ql-toolbar button {
            color: #ffffff; /* Cor dos ícones dos botões */
        }

        /* Botões ao passar o mouse ou em foco */
        .ql-toolbar button:hover,
        .ql-toolbar button:focus {
            background-color: #374151; /* Fundo ao passar o mouse */
        }

        /* Dropdowns da toolbar */
        .ql-toolbar .ql-picker {
            color: #ffffff; /* Cor do texto do dropdown */
        }

        /* Fundo e texto das opções do dropdown */
        .ql-toolbar .ql-picker-options {
            background-color: #1f2937; /* Fundo das opções do dropdown */
            color: #ffffff; /* Cor do texto das opções */
        }

        /* Opção do dropdown ao passar o mouse */
        .ql-toolbar .ql-picker-options .ql-picker-item:hover {
            background-color: #374151; /* Fundo ao passar o mouse */
        }

        /* Dropdowns selecionados */
        .ql-toolbar .ql-picker .ql-active {
            color: #ffffff; /* Texto ativo */
            background-color: #374151; /* Fundo ativo */
        }

        /* Bordas e ícones */
        .ql-toolbar .ql-stroke {
            stroke: #ffffff; /* Cor dos ícones que usam linhas */
        }

        .ql-toolbar .ql-fill {
            fill: #ffffff; /* Cor dos ícones que usam preenchimento */
        }

        .ql-toolbar .ql-picker-label {
            color: #ffffff; /* Cor do texto dos labels */
        }

        /* Personalização de entradas de texto */
        .ql-toolbar input {
            background-color: #374151; /* Fundo do input */
            color: #ffffff; /* Texto do input */
            border: 1px solid #4b5563; /* Bordas do input */
        }

        /* Placeholder no tema escuro */
        .ql-toolbar input::placeholder {
            color: #9ca3af; /* Placeholder cinza claro */
        }
    </style>

</div>
