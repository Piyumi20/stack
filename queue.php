<?php

class Queue {
    private $_size;
    private $_queue = [];

    public function __construct($size) {
        $this->_size = $size;
    }

    // Enqueue: Add an element to the end of the queue
    public function enqueue($item) {
        if (count($this->_queue) >= $this->_size) {
            return false; // Queue is full
        }
        $this->_queue[] = $item;
        return true;
    }

    // Dequeue: Remove an element from the front of the queue
    public function dequeue() {
        if ($this->isEmpty()) {
            return null; // Queue is empty
        }
        return array_shift($this->_queue);
    }

    // Get the front element without removing it
    public function front() {
        if ($this->isEmpty()) {
            return null; // Queue is empty
        }
        return $this->_queue[0];
    }

    // Check if the queue is empty
    public function isEmpty() {
        return empty($this->_queue);
    }

    // Get the current size of the queue
    public function size() {
        return count($this->_queue);
    }
}

/**
 * Example usage
 */
$q = new Queue(10);

// Enqueue values 1-10
for ($i = 1; $i <= 10; ++$i) {
    $q->enqueue($i);
}

// Dequeue all values
while (($val = $q->dequeue()) !== null) {
    echo $val . "\n";
}
