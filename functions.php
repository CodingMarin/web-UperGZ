function FormatCharNameclanadmin($name, $rank)
{
    switch($rank)
    {
        case 0:
            return $name;
        break;
        case 2:
            return "<font color='#FFF200'>$name</font>";
        break;
        case 104:
            return "<font color='#525252'>$name</font>";
        break;
        case 252:
            return "<font color='#33CC00'>$name</font>";
        break;
        case 253:
            return "<strike><font color='#000000'>$name</font></strike>";
        break;
        case 254:
            return "<font color='#00E1FF'>$name</font>";
        break;
        case 255:
            return "<font color='#ff7700'>$name</font>";
        break;
        default:
            return "<font color='4C0094'>$name</font>";
        break;
    }
}  