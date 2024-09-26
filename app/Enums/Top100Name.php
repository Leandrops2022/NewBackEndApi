<?php

namespace App\Enums;

enum Top100Name: string
{
    case ACAO              = 'ação';
    case AVENTURA          = 'aventura';
    case ANIMACAO          = 'animação';
    case CLASSICOS         = 'clássícos';
    case COMEDIA           = 'comédia';
    case CRIME             = 'crime';
    case DRAMA             = 'drama';
    case FAMILIA           = 'família';
    case FANTASIA          = 'fantasia';
    case TERROR            = 'terror';
    case MUSICAL           = 'musical';
    case MISTERIO          = 'mistério';
    case ROMANCE           = 'romance';
    case FICCAO_CIENTIFICA = 'ficção-científica';
    case SUSPENSE          = 'suspense';
    case GUERRA            = 'guerra';
    case FAROESTE          = 'faroeste';
    case GERAL             = 'geral';
}
