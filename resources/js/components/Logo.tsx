import { Link } from '@inertiajs/react';

type LogoProps = {
  size?: 'xs' | 'sm' | 'md' | 'lg' | 'xl' | '2xl' | '3xl' | '4xl' | '5xl' | '6xl' | '7xl' | '8xl' | '9xl';
};

const sizeMap = {
  xs: 'text-xs',
  sm: 'text-sm',
  md: 'text-md',
  lg: 'text-lg',
  xl: 'text-xl',
  '2xl': 'text-2xl',
  '3xl': 'text-3xl',
  '4xl': 'text-4xl',
  '5xl': 'text-5xl',
  '6xl': 'text-6xl',
  '7xl': 'text-7xl',
  '8xl': 'text-8xl',
  '9xl': 'text-9xl',
} as const;

const Logo = ({ size = '3xl' }: LogoProps) => {
  return (
    <Link href="/" className={`${sizeMap[size]} bg-linear-135 from-[#1a365d] via-primary to-[#7877c6] bg-clip-text font-black text-transparent`}>
      AuraTech
    </Link>
  );
};

export default Logo;
