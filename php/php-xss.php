<?php
/**
 * Prevent XSS.
 *
 * @author liuxd
 */
class util_xss
{
    /**
     * 设置标签和属性的白名单。
     * @param array $p_aTags
     * @param array $p_aAttr
     */
    public function __construct($p_aTags, $p_aAttr)
    {
        $this->aTags = $p_aTags;
        $this->aAttr = $p_aAttr;
    }

    /**
     * 过滤器。
     * @param string $p_sInput
     * @return string
     */
    public function filter($p_sInput)
    {
        $aMatches = [];
        $sPattern = '/<([a-zA-Z]+).*>.*<\/\1>/';
        preg_match_all($sPattern, $p_sInput, $aMatches);
        $sInput = $p_sInput;

        if (empty($aMatches[1])) {
            return $sInput;
        }

        list ($aContents, $aTags) = $aMatches;

        foreach ($aTags as $iKey => $sTag) {
            if (!in_array($sTag, $this->aTags)) {
                // 标签不合法
                $sInput = str_replace($aContents[$iKey], '', $sInput);
            } else {
                $aTag = [];
                preg_match('/<' . $sTag . '.*?>/', $aContents[$iKey], $aTag);
                $aAttr = explode(' ', $aTag[0]);

                if (!$this->checkAttr($aAttr)) {
                    // 标签虽然合法，但是包含了不合法的属性。
                    $sInput = str_replace($aContents[$iKey], '', $sInput);
                }
            }
        }

        return trim($sInput);
    }

    /**
     * 检查合法标签是否有非法属性。
     * @param array $p_aAttr 标签熟悉列表
     * @return bool
     */
    private function checkAttr($p_aAttr)
    {
        $bResult = true;

        foreach ($p_aAttr as $sAttr) {
            $sAttrName = strstr($sAttr, '=', true);

            if ($sAttrName === false) {
                continue;
            }

            if (!in_array($sAttrName, $this->aAttr)) {
                $bResult = false;
            }
        }

        return $bResult;
    }

}

# end of this file
