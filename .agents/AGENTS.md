# AGENTS.md - Documentação Técnica e Arquitetura do Repositório

Este arquivo contém as diretrizes técnicas, arquitetura de código e especificações detalhadas do repositório `jvffernandes1.github.io`. Ele serve como guia para desenvolvedores e agentes de IA que forem trabalhar na manutenção ou evolução dos projetos deste repositório, em especial a futura versão **FenixApp 2.0**.

---

## 📌 1. Visão Geral da Estrutura do Repositório

```
jvffernandes1.github.io/
├── index.html                   # Página principal (Portfólio Pessoal bilíngue)
├── content/
│   └── static/
│       ├── style.css            # Estilos globais e media queries responsivas
│       ├── lang.json            # Dicionário de traduções (Português / Inglês)
│       ├── lang-update.js       # Script de gerenciamento de i18n
│       ├── order-timeline.js    # Ordenação cronológica da timeline
│       ├── expand-timeline.js   # Expansão dos itens da timeline
│       └── experience_details.js# Controle de visualização da seção Profissional
├── img/                         # Imagens, logos e fotos do portfólio
├── FenixApp/                    # Aplicação de Telemetria Veicular (Formula SAE)
│   ├── index.html               # Dashboard Realtime 01
│   ├── dash02.html              # Dashboard Realtime 02
│   ├── dash03.html              # Dashboard Realtime 03
│   ├── analysis.html            # Análise Histórica de Dados
│   ├── download.html            # Exportação de Dados em formato bruto
│   ├── about.html               # Sobre a Equipe Fênix Racing FSAE
│   └── assets/ & dist/          # Scripts, estilos e biblioteca ApexCharts
└── .agents/
    └── AGENTS.md                # Este documento de arquitetura
```

---

## 🌐 2. Arquitetura do Portfólio Principal (`index.html`)

### 2.1 Visão Geral e Propósito
O `index.html` é o portfólio profissional bilíngue (Português/Inglês) de **João Victor Fernandes**, Engenheiro Eletricista e especialista em inteligência operacional e automação no setor de Óleo & Gás.

### 2.2 Divisão por Seções
1. **Navegação (`#navbar` e `.bottom-nav`)**:
   - Desktop: Barra superior fixa (`.barra_nav`) com links para as seções e alternador de idioma.
   - Mobile (`@media (max-width: 768px)`): Esconde a barra superior e exibe a barra fixa inferior (`.bottom-nav`) para fácil usabilidade no celular.
2. **Quem Sou Eu (`#content_start` / `.class_start`)**:
   - Apresentação pessoal e foto de perfil (`img/perfil.jpg`).
   - Flexbox adaptável em coluna no mobile.
3. **Linha do Tempo (`#timeline` / `.class_timeline`)**:
   - Histórico de trajetória profissional e acadêmica (2014 até o momento).
   - Suporta ordenação ascendente/descendente pelo botão de filtro e expansão dos textos ao clicar.
4. **Educação (`#education` / `.class_education`)**:
   - Cards com informações da Graduação na UNESP, Segunda Graduação na UNIVESP e Curso Técnico no CTI.
5. **Profissional (`#professional` / `.class_professional`)**:
   - Lista interativa de experiências em empresas (SBM Offshore, Radix, Instituto Eldorado, Ambar Engenharia, DTI UNESP, Casa do Real).
   - **Mecanismo Desktop**: Coluna esquerda com botões e coluna direita com o card e foto correspondente.
   - **Mecanismo Mobile**: A caixa de detalhes é exibida suavemente logo abaixo da lista de botões com rolagem automática via `experience_details.js`.
6. **Projetos (`#projects` / `.class_projetos`)**:
   - Destaques dos projetos: **Telemetria Veicular Formula SAE** e **ProTECH (Robô de Investimentos)**.
   - Design responsivo em card vertical no mobile.
7. **Botões Flutuantes e Rodapé**:
   - Botões de contato direto via WhatsApp e LinkedIn. No mobile, ficam flutuando no canto inferior direito acima do menu.

### 2.3 Sistema de Internacionalização (i18n)
- **Arquivo de Dados**: `content/static/lang.json` contém as chaves `"pt"` e `"en"`.
- **Funcionamento**: O script `lang-update.js` monitora os checkboxes `#lang` (desktop) e `#lang2` (mobile). Ao alterar a chave, percorre todos os elementos DOM com o atributo `data-key` e substitui o conteúdo dinamicamente via `innerHTML`.

### 2.4 Design System & CSS (`content/static/style.css`)
- **Variáveis Globais**:
  - `--cor-principal`: `#2C3639` (Escuro base)
  - `--cor-secundaria`: `#3F4E4F` (Cinza médio)
  - `--cor-texto`: `#DCD7C9` (Bege/creme para texto e fundos claros)
  - `--cor-destaque`: `#A27B5C` (Marrom/Dourado quente)
  - `--cor-link_hover`: `#dcc797`
  - `--cor-menu`: `#1b2225`
- **Responsividade**: Usa `@media (max-width: 768px)` com `overflow-x: hidden`, layouts flexíveis em coluna, remoção de alturas rígidas (`height: auto; min-height: ...`) e espaçamentos adequados para toque em smartphones.

---

## 🏎️ 3. Arquitetura da Aplicação `FenixApp` (Telemetria Formula SAE)

### 3.1 Propósito da Aplicação
O **FenixApp** é o sistema de telemetria veicular em tempo real desenvolvido para o protótipo da equipe **Fênix Racing Formula SAE (UNESP Ilha Solteira)**.
A aplicação lê dados de microcontroladores embarcados no carro (ESP32 / Arduino com barramento CAN) transmitidos via Wi-Fi/4G para o banco de dados Firebase, permitindo o monitoramento de engenharia direto do box/paddock.

### 3.2 Estrutura do Banco de Dados (Firebase Realtime Database)
- **URL do Banco**: `https://fenix-racing-bot-default-rtdb.firebaseio.com`
- **Caminho principal**: `packages/`
- **Estrutura dos Pacotes de Dados JSON**:
  ```json
  {
    "packages": { "-Mkey...": {
      "susp1": 512,        // Suspensão Dianteira Direita (ADC 0-1023)
      "susp2": 480,        // Suspensão Dianteira Esquerda
      "susp3": 500,        // Suspensão Traseira Direita
      "susp4": 510,        // Suspensão Traseira Esquerda
      "temp1": 45,         // Temperatura do Pneu (Interna - °C)
      "temp2": 48,         // Temperatura do Pneu (Média - °C)
      "temp3": 42,         // Temperatura do Pneu (Externa - °C)
      "acc_x": 0.12,       // Aceleração Eixo X (G-force)
      "acc_y": 0.98,       // Aceleração Eixo Y (G-force)
      "acc_z": 0.05,       // Aceleração Eixo Z (G-force)
      "rpm": 8500,         // Rotações por Minuto do Motor
      "velocidade": 82,    // Velocidade do Veículo (km/h)
      "temp_motor": 92,    // Temperatura do Líquido de Arrefecimento (°C)
      "volante": 12,       // Ângulo do Volante (Graus)
      "timestamp": 1640000000 // Carimbo de data/hora
    }}
  }
  ```

### 3.3 Páginas da Aplicação Original
1. **`index.html` (Dashboard Realtime 01)**:
   - Utiliza a biblioteca **ApexCharts** para plotar 14 gráficos de linha de séries temporais em tempo real.
   - Escuta novos eventos do Firebase via SDK `onValue(ref(db, 'packages'), ...)`.
   - Atualiza as séries do ApexCharts via `chart.updateSeries(...)` em um loop contínuo `window.setInterval(...)`.
2. **`dash02.html` e `dash03.html`**:
   - Variações de layout focadas em métricas específicas (ex: Powertrain vs. Dinâmica Veicular).
3. **`analysis.html` (Análise de Dados Históricos)**:
   - Faz o download completo do histórico via `$.getJSON` REST do Firebase.
   - Converte valores brutos de ADC dos potômetros de suspensão para milímetros usando a fórmula:
     $$\text{curso (mm)} = \text{valor\_adc} \times \left(\frac{30}{1023}\right) = \text{valor\_adc} \times 0.02932551319$$
   - Plota gráficos combinados de telemetria agrupados com sincronização de zoom.
4. **`download.html`**:
   - Permite a exportação bruta dos dados gravados durante os treinos/provas para formato CSV/JSON para análise no MATLAB, Python ou Excel.
5. **`about.html`**:
   - Página informativa sobre o projeto FSAE e integrantes da equipe.

---

## 🚀 4. Roadmap para a Versão FenixApp 2.0 (Diretrizes de Refatoração)

Para a reconstrução e modernização do **FenixApp 2.0**, o novo agente de IA ou desenvolvedor deve seguir as seguintes diretrizes de arquitetura:

### 4.1 Stack Tecnológica Sugerida para o FenixApp 2.0
- **Framework Front-end**: React 18+ ou Next.js (TypeScript) ou Vite + React.
- **Estilização**: TailwindCSS + Shadcn UI para componentes modernos e temas dark de alta performance.
- **Visualização de Dados & Gráficos**: Recharts, Chart.js ou ECharts (para melhor performance com milhares de pontos em tempo real do que ApexCharts).
- **Conexão de Dados**:
  - Firebase SDK v10+ (Modular) com `onChildAdded` / WebSockets.
  - Alternativa com API REST / WebSockets em Python (FastAPI / WebSockets) ou Node.js se for utilizado MQTT da ECU do veículo.

### 4.2 Novas Funcionalidades Desejadas no FenixApp 2.0
1. **Cockpit Digital (Cluster de Instrumentos)**:
   - Tacômetro radial/semi-circular dinâmico para o RPM do motor com Shift Light configurável.
   - Velocímetro digital central destacado com indicador de marcha engatada (Gear Indicator).
2. **Gráfico G-G Diagram (Diagrama de Aceleração Lateral vs. Longitudinal)**:
   - Plot bidimensional scatter (Acc X vs. Acc Y) para análise do envelope de aderência dos pneus em curvas e frenagens.
3. **Mapeamento GPS de Pista (Track Map)**:
   - Se dados de GPS forem gravados, renderizar o traçado da pista (Leaflet / Mapbox / Canvas) pintando a linha da pista com gradiente de cor por velocidade ou uso de freio.
4. **Comparação de Voltas (Lap Comparison)**:
   - Ferramenta de overlay para sobrepor dados da "Volta Mais Rápida" (Best Lap) com a volta atual.
5. **Controle de Alertas em Tempo Real**:
   - Alertas visuais de aviso se a temperatura do motor ultrapassar o limite (ex: > 105°C) ou se a pressão/temperatura do pneu estiver fora da janela ideal.
6. **Modo Responsivo Mobile & Tablet**:
   - Dashboard preparado para visualização no celular de mecânicos e tablets dos engenheiros de pista.

---

## 📝 5. Diretrizes para Agentes de IA

Ao realizar alterações neste repositório:
1. **Preservar Internacionalização**: Ao adicionar novos textos em `index.html`, crie as respectivas chaves em `content/static/lang.json` (seções `"pt"` e `"en"`).
2. **Manter Responsividade**: Qualquer novo componente CSS deve ser testado para visualização em desktop e mobile (`max-width: 768px`).
3. **Evitar Sobrescrita do FenixApp Legado**: Ao iniciar o desenvolvimento do `FenixApp 2.0`, crie a nova versão em um diretório próprio (ex: `FenixApp2` ou `fenix-app-v2`) para preservar a versão 1.0 funcional até a conclusão da migração.
