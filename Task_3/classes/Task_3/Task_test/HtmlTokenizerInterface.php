<?php

namespace inefable\test_task;

/**
 * Tokenizer interface.
 */
interface HtmlTokenizerInterface
{
    /**
     * Get all tokens.
     * 
     * @return array  Array of collected tokens.
     */
    public function getTokens();
}
