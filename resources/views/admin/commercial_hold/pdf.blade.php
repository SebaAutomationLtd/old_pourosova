<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #fff;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #fff;
            }
        </style>
    </head>
    <body>
    <center><h2>Commercial Holds Report</h2></center><br>
    <table>
        <thead>
            <tr style="">
                <th>SLNo</th>
                <th>Name</th>
                <th>Father/Husband</th>
                <th>Mobile No</th>
                <th>NID/Birth Certificate</th>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all as $key => $row)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $row->owner_name }}</td>
                <td>{{ $row->father_name == null ? $row->husband_name : $row->father_name }}
                </td>
                <td>{{ $row->mobile }}</td>
                <td>{{ $row->nid == null ? $row->birth_certificate : $row->nid }}</td>
                <td>{{ $row->user_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>