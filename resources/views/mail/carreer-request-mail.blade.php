<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Nuova richiesta di lavoro</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif; color: #111111;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-top: 4px solid #c8102e;">

                    {{-- intestazione --}}
                    <tr>
                        <td style="padding: 30px; text-align: center; border-bottom: 1px solid #e5e5e5;">
                            <h1 style="margin: 0; font-family: Georgia, serif; font-size: 32px; color: #111111;">The Aulab Post</h1>
                        </td>
                    </tr>

                    {{-- contenuto --}}
                    <tr>
                        <td style="padding: 30px;">
                            <h2 style="margin: 0 0 20px; font-size: 20px;">Hai ricevuto una nuova richiesta di lavoro</h2>

                            <p style="margin: 0 0 10px;">
                                <strong>Ruolo richiesto:</strong>
                                <span style="color: #c8102e; text-transform: uppercase; font-weight: bold;">{{ $info['role'] }}</span>
                            </p>

                            <p style="margin: 0 0 20px;">
                                <strong>Email:</strong> {{ $info['email'] }}
                            </p>

                            <p style="margin: 0 0 8px;"><strong>Messaggio di presentazione:</strong></p>
                            <div style="background-color: #f8f8f8; border-left: 3px solid #c8102e; padding: 15px; line-height: 1.6;">
                                {!! nl2br(e($info['message'])) !!}
                            </div>
                        </td>
                    </tr>

                    {{-- Piè di pagina --}}
                    <tr>
                        <td style="padding: 20px 30px; background-color: #111111; color: #bbbbbb; font-size: 13px; text-align: center;">
                            Puoi accettare la richiesta dalla dashboard amministratore di The Aulab Post.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>