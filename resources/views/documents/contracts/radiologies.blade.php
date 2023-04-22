<?php
$request = array();
$request['name'] = '__________';
$request['cnpj'] = '__________';
$request['number_document'] = '__________';
$request['address'] = '__________';
$request['number'] = '__________';
$request['complement'] = '__________';
$request['district'] = '__________';
$request['state'] = '__________';
$request['city'] = '__________';
$request['zipcode'] = '__________';
$request['ddd'] = '__________';
$request['phone'] = '__________';
$request['email'] = '__________';
$request['data'] = '__________';
$request['name_doctor'] = '__________';
$request['cpf_doctor'] = '__________';
$request['type_document'] = '__________';
$request['number_document'] = '__________';
?>
<!DOCTYPE html>
<html>
<head>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">

    <style>
        body {
            font-family: Arial;
            font-size: 14pt;
            margin-left: 5%;
            margin-right: 5%
        }

        p {
            text-align: justify
        }

        h1 {
            font-size: 18pt;
            font-weight: bold;
            text-align: center
        }

        h2 {
            font-size: 16pt;
            font-weight: bold;
            text-align: justify
        }

    </style>
</head>

<body>
    <div>

        <img style="margin-left:40%" src="{{ asset('images/logo-AEPETBAHIA.png') }}" />
        <h1>CONVÊNIO PARA ATENDIMENTOS NA ÁREA DE ASSISTÊNCIA MÉDICA E ODONTOLÓGICA – CLÍNICAS DE IMAGEM PESSOA JURÍDICA
        </h1>

        <p>São partes deste instrumento:</p>
        <p><b>Associação dos Engenheiros da Petrobras – Núcleo Bahia – AEPET-BA</b>, associação sem fins lucrativos,
            situada na Av. Tancredo Neves, Nº 2539, Condomínio CEO, Torre Londres, sala 106, CEP 41.820-021, <b>CNPJ:
                32.605.958/0001-00</b>, doravante denominada simplesmente <b>AEPET-BA</b>, legalmente representada neste
            ato pelo Presidente Marcos André dos Santos, CPF 923.759.285-04.</p>
        <p>e do outro lado, a empresa Razão Social <b> {{ $request['name'] }}</b>, CNPJ {{ $request['cnpj'] }},
            localizada na Rua {{ $request['address'] }}, N° {{ $request['number'] }},
            {{ $request['complement'] }}, bairro {{ $request['district'] }},
            {{ $request['city'] }}/{{ $request['state'] }}, CEP: {{ $request['zipcode'] }}, telefone (
            {{ $request['ddd'] }}) {{ $request['number'] }}, email {{ $request['email'] }}, neste instrumento
            representada por Dr.(a) {{ $request['name_doctor'] }}, CPF {{ $request['cpf_doctor'] }},
            {{ $request['type_document'] }} Nº {{ $request['number_document'] }}, doravante denominado
            <b>CONVENIADO</b>, celebram este convênio.</p>

        <h2>CLÁUSULA 1ª – DO OBJETO DO CONVÊNIO</h2>
        <p>O objeto do presente convênio é a prestação de serviços área na médica ou odontológica, pelo
            <b>CONVENIADO</b>, aos associados e dependentes da <b>AEPET-BA</b>, devidamente identificados com a carteira
            específica expedida pela <b>AEPET-BA</b>.</p>

        <h2>CLÁUSULA 2ª – DO PRAZO DE VIGÊNCIA CONTRATUAL</h2>
        <p>O prazo deste convênio é indeterminado, podendo ser rescindido por qualquer das partes após aviso escrito e
            entregue com trinta dias de antecedência.</p>

        <h2>CLÁUSULA 3ª – DAS OBRIGAÇOES DA AEPET-BA</h2>
        <p><b>3.1</b> – Cadastrar os seus associados e dependentes usuário do convênio no estado da Bahia;</p>
        <p><b>3.2</b> – Expedir as carteiras de identificação dos associados e dos seus respectivos dependentes;</p>
        <p><b>3.3</b> – Divulgar aos associados e respectivos dependentes a relação com indicação de profissionais
            conveniados para atendimento, contendo o nome, endereço, telefones e especialidades atendidas pelo
            <b>CONVENIADO</b>;</p>
        <p><b>3.4</b> – Manter os dados cadastrais do <b>CONVENIADO</b> devidamente atualizado em seu sistema, sempre
            que solicitado;</p>


        <h2>CLÁUSULA 4ª – DAS OBRIGAÇÕES DO CONVENIADO</h2>
        <p><b>4.1</b> – Atender os associados e dependentes da <b>AEPET-BA</b>, dentro das suas especializações e
            conforme sua sistemática de atendimento;</p>
        <p><b>4.2</b> – Praticar os preços definidos nas tabelas de Assistência Médica da Petrobras no estado da Bahia;
        </p>
        <p><b>4.3</b> – Fornecer aos associados e dependentes, sempre que solicitado, os recibos dos serviços prestados;
        </p>
        <p><b>4.4</b> – Fica ciente o <b>CONVENIADO</b> que a <b>AEPET-BA</b> fica isenta de quaisquer responsabilidades
            quanto a qualquer pagamento;</p>
        <p><b>4.6</b> – Consta como anexo a este Convênio a relação das especialidades ofertadas;</p>
        <p><b>4.7</b> - Consta como anexo a este convênio a relação dos profissionais do <b>CONVENIADO</b>, nome, CNPJ,
            CREMEB ou CROBA e especialidade, que estão disponíveis para o atendimento.</p>


        <h2>CLÁUSULA 5ª - DAS OBRIGAÇÕES DOS ASSOCIADOS E DEPENDENTES</h2>
        <p>Selecionar o profissional, agendar conforme disponibilidade, apresentar a carteira de associado ou dependente
            atualizada, juntamente com um documento de identificação e após ser atendido efetuar o pagamento pelos
            serviços prestados, de acordo com a forma previamente combinada entre as partes interessadas.</p>


        <h2>CLÁUSULA 6ª – DA DOCUMENTAÇÂO</h2>
        <p><b>6.1</b> – O <b>CONVENIADO</b> apresentou a documentação citada abaixo e se responsabiliza pela atualização
            e veracidade das informações;</p>
        <p>OBS: A apresentação da dispensa dos documentos citados abaixo, quando aplicável:</p>
        <p>6.1.1 – Contrato Social da empresa em sua última atualização;</p>
        <p>6.1.2 – Alvará de funcionamento da empresa;</p>
        <p>6.1.3 – Registro no Conselho Regional do responsável técnico;</p>
        <p>6.1.4 – Identidade e CPF do responsável técnico;</p>
        <p>6.1.5 – Cópia de credenciamento na Assistência Médica da Petrobras no estado da Bahia;</p>
        <p>6.1.6 – Relação das especialidades em que atua;</p>


        <h2>CLÁUSULA 7ª – DO FORO</h2>
        <p>Para dirimir possíveis controvérsias decorrentes deste contrato, as partes elegem o foro da cidade de
            Salvador, renunciando expressamente a qualquer outro por mais privilegiado que seja.</p>
        <p>E, por estarem justos e contratados, assinam o presente convênio em duas vias com um só efeito.</p>


        <p style="text-align:center">Salvador/Bahia, {{ $request['data'] }}.</p>


        <table style="width:70%;margin:0 auto">
            <tr>
                <td>
                    <p style="margin-left:80px;margin-bottom:0px;margin-top:0px">MARCOS ANDRÉ DOS SANTOS<br>A assinatura
                        do presidente foi processada de forma virtual com &quot;a autorização&quot; no Sistema da
                        AMS/AEPET-BA</p>
                </td>
                {{-- <td><img style="margin-left:80px" src="https://ci6.googleusercontent.com/proxy/hbbf2JZ71qJWl_m02_BdIqGMvWXA_Kt1dRQNr69K2XZjyvXOPiKfMgzEDP3ino3SPNq0enM=s0-d-e1-ft#http://Assinatura-Marcos-Andre.png"></td> --}}
                <td>
                    <p style="margin-left:80px">Dr.(a) {{ $request['name_doctor'] }} <br>A assinatura do conveniado
                        foi processada de forma virtual com &quot;de acordo&quot; no Sistema da AMS/AEPET-BA</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-left:80px;margin-bottom:0px;margin-top:0px">p/ <b>AEPET-BA</b></p>
                </td>
                <td>
                    <p style="margin-left:80px;margin-bottom:0px;margin-top:0px">p/ <b>CONVENIADO</b></p>
                </td>
            </tr>
            <tr>
                <td></td>
                {{-- <td><p style="margin-left:80px;margin-bottom:0px;margin-top:0px">MARCOS ANDRÉ DOS SANTOS</p></td> --}}
                <td>
                    <p style="margin-left:80px;margin-bottom:0px;margin-top:0px"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-left:80px;margin-bottom:0px;margin-top:0px">Presidente da AEPET-BA</p>
                </td>
                {{-- <td><p style="margin-left:80px;margin-bottom:0px;margin-top:0px">CPF 923.759.285-04</p></td> --}}
                <td>
                    <p style="margin-left:80px;margin-bottom:0px;margin-top:0px"></p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>


    </div>

</body>

</html>
