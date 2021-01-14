<?php // ^7.4.*

namespace PrintBar\Test1;

function word_count(string $text): array {

    return array_reduce(
        preg_split('#\s+#', preg_replace('#[^\w\s]#u', ' ', $text)),
        static fn (array $counters, string $word): array => $word
            ? [$word => 1 + ($counters[$word] ?? 0)] + $counters
            : $counters,
        []
    );
}

function top_five_words(string $text): array {

    $counters = word_count($text);
    arsort($counters);

    return array_slice($counters, 0, 5);
}