define(  
    ['jquery'],
    function($) {
        'use strict';

        $(function() {
            var $container = $('#skills');
            if ($container.length == 0) return;

            var $skills = $container.children();
            if ($skills.length == 0) return;

            var skillYSpacing = 15,
                skillsDisplayedTogether = 6,
                displayBottomMargin = 30,
                displayLeftMargin = 10,
                totalBold = 2,
                currentSkill = 0;

            var animateSkills = function()
            {
                var animated = 0,
                    bottomMarginOffset = 0,
                    faded = 0,
                    bolded = 0,
                    lastSkillBolded = false,
                    skillHeight = $skills.first().height(),
                    containerWidth = $container.width(),
                    containerHeight = $container.height(),
                    displayRightMargin = Math.floor(containerWidth - (containerWidth * 0.20));

                while (animated < skillsDisplayedTogether) {
                    animated ++;
                    
                    if ($skills[currentSkill] === undefined ) currentSkill = 0;

                    var $skill = $($skills[currentSkill]);
                    
                    $skill.css(
                        {
                            'top': (animated > 1 ? displayBottomMargin : 0) + bottomMarginOffset,
                            'left': Math.floor(Math.random() * (displayRightMargin - $skill.width())) + displayLeftMargin
                        }
                    );
                   
                    if (!lastSkillBolded && bolded < totalBold && (Math.random() * 100) > 60) {
                        bolded ++;
                        $skill.addClass('bold');
                        lastSkillBolded = true;
                    } else {
                        lastSkillBolded = false;
                    }

                    $skill.fadeIn(
                        1200,
                        function()
                        {
                            var $displayedSkill = $(this);
                            setTimeout(
                                function()
                                {
                                    faded ++;
                                    $displayedSkill.fadeOut(
                                        1800,
                                        function()
                                        {
                                            $(this).removeClass('bold');
                                        }
                                    );
                                    if (faded == skillsDisplayedTogether) animateSkills();
                                },
                                1800
                            )
                        }
                    );

                    bottomMarginOffset += skillHeight + skillYSpacing;
                    currentSkill ++;
                } 
            }

            setTimeout(function() {animateSkills();}, 200);
        });
    }
);
