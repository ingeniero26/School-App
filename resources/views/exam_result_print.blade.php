<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Notas</title>
    <style type="text/css">
        @page {
            size: 8.3in 11.7in;
        }

        @page {
            size: A4;
        }

        .margin-bottom {
            margin-bottom: 3px;
        }

        .table-bg {
            border-collapse: collapse;
            width: 100%;
            font-size: 15px;
            text-align: center;
        }

        .th {
            border: 1px solid #000;
            padding: 10px;
        }

        .td {
            border: 1px solid #000;
            padding: 3px;
        }

        .text-container {
            text-align: left;
            padding-left: 5px;
        }

        @media print {
            @page {
                margin: 0px;
                margin-left: 20px;
                margin-right: 20px;
            }
        }
    </style>
</head>

<body>
    <div id="page">
        <table style="width:100%; text-align:center;">
            <tr>
                <td width="5%"></td>
                <td width="15%"><img style="width:80px;" src="{{$getSetting->getLogo()}}" alt=""></td>
                <td align="left">
                    <h2>{{$getSetting->school_name}}</h2>
                    <h3>Licencia: {{$getSetting->operating_license}} </h3>
                    <p>Representante Legal: {{$getSetting->legal_representative}} -
                        Dirección: {{$getSetting->address}} -
                        Tel: {{$getSetting->phone}}

                    </p>
                </td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 5%"></td>
                <td style="width: 70%">
                    <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="27%"><b>Estudiante:</b></td>
                                <td style="border-bottom: 1px solid; width:100%">{{$getStudent->name}} {{$getStudent->last_name}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="27%">Documento:</td>
                                <td style="border-bottom: 1px solid; width:100%">{{$getStudent->roll_number}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="27%">No Admisión:</td>
                                <td style="border-bottom: 1px solid; width:100%">{{$getStudent->admission_number}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="27%">Programa:</td>
                                <td style="border-bottom: 1px solid; width:100%">{{$getClass->class_name}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="27%">Ciclo:</td>
                                <td style="border-bottom: 1px solid; width:20%">{{$getExam->name}}</td>
                                {{-- <td width="11%">Ciclo :</td>
                                <td style="border-bottom: 1px solid; width:80%"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                    {{-- <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="10%">Total:</td>
                                <td style="border-bottom: 1px solid; width:50%"></td>
                                <td width="18%">Promedio :</td>
                                <td style="border-bottom: 1px solid; width:50%"></td>
                            </tr>
                        </tbody>
                    </table> --}}
                </td>
                <td width="5%"></td>
                <td width="20%" align="top"><img style="border-raduis:6px;" src="{{$getStudent->getProfileDirect()}}"
                        alt="" height="100px" width="100px"></td>


            </tr>
        </table>
        <br>
        <div>
            <table class="table-bg" id="example2">
                <thead>
                    <tr>
                        <th class="th">Asignatura</th>
                        <th class="th">Trabajo Clase</th>
                        <th class="th">Tarea</th>
                        <th class="th">Taller</th>
                        <th class="th">Examen</th>
                        <th class="th">Total</th>
                        <th class="th"> Máxima</th>
                        <th class="th">Mínima</th>
                        <th class="th">Estado</th>


                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_score =0;
                        $full_marks =0;
                        $result_validation =0;
                    @endphp
                @foreach($getExamMark as $exam)
                  @php
                        $total_score =$total_score  + $exam['total_score'];
                        $full_marks =$full_marks  + $exam['full_marks'];
                    @endphp
                       <tr>
                           <td class="td" style="text-align: left;">{{$exam['subject_name'] }}</td>
                           <td class="td">{{$exam['class_work'] }}</td>
                           <td class="td">{{$exam['test_work'] }}</td>
                           <td class="td">{{$exam['home_work'] }}</td>
                           <td class="td">{{$exam['exam'] }}</td>
                           <td class="td">{{$exam['total_score'] }}</td>
                           <td class="td">{{$exam['full_marks'] }}</td>
                           <td class="td">{{$exam['passing_mark'] }}</td>
                           <td class="td">
                           @if($exam['total_score'] >= $exam['passing_mark'])
                           <span style="color:aqua; font-weight: bold">Aprobado</span>
                           @else
                           @php
                               $result_validation = 1;
                           @endphp
                            <span style="color:red font-weight: bold">Perdiste</span>
                           @endif
                           </td>

                       </tr>
                    @endforeach
                    <tr>
                        <td  class="td" colspan="2">
                            <b>Totales:
                                 {{ $total_score }} /{{ $full_marks }}
                                </b>
                        </td>
                        <td  class="td" colspan="3">
                            @php
                                $porcentage=($total_score * 100) /$full_marks;
                                 $getGrade = App\Models\MarksGradeModel::getGrade($porcentage);
                            @endphp
                            <b>Porcentaje:
                                 {{  round( $porcentage,2) }} %
                                </b>
                        </td>
                        <td class="td" colspan="3">

                            <b>Grado:
                                 {{  $getGrade }}
                                </b>
                        </td>
                        <td class="td" colspan="2">
                            <b>Estado:
                                 @if($result_validation == 0)
                                 <span style="color: blue">Aprobaste</span>
                                 @else
                                <span style="color: red">Perdiste</span>
                                 @endif
                            </b>
                        </td>
                    </tr>
               </tbody>
            </table>
        </div>
        <div>
            <p>
                {{$getSetting->exam_description}}            </p>
        </div>
        <table class="margin-bottom" style="width: 100%;">
            <tbody>
                <tr>
                    <td width="27%"><b>Firma:</b></td>
                    <td style="border-bottom: 1px solid; width:100%"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
         window.print();
    </script>
</body>

</html>
