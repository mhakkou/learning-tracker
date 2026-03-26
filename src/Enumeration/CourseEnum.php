<?php

namespace Mhakkou\LearningTracker\Enumeration;

enum CourseEnum: string {
     case NOT_STARTED = 'not started';
     case IN_PROGRESS = 'in progress'; 
     case DONE = 'done';
}